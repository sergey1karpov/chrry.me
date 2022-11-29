<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Services\StatsService;
use App\Services\UploadPhotoService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private UploadPhotoService $uploadService,
    ) {}

    public function createProductForm(int $userId)
    {
        $user = User::findOrFail($userId);

        $categories = $user->productCategories;

        return view('product.add-product', compact('user', 'categories'));
    }

    /**
     * @param int $userId
     * @param ProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     *
     * Add new user product
     */
    public function addProduct(int $userId, ProductRequest $request, Product $product)
    {
        $product->storeProduct($userId, $request, $this->uploadService);

        return redirect()->route('editProfileForm', ['id' => $userId])->with('success', 'Товар успешно добавлен');
    }

    /**
     * @param int $userId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Show all user products
     */
    public function allProducts(int $userId)
    {
        $user = User::find($userId);

        $products = Product::where('user_id', $userId)->where('delete', null)->orderBy('position')->get();

        return view('product.products', compact('user', 'products'));
    }

    public function showProduct(int $userId, Product $product)
    {
        $user = User::findOrFail($userId);

        $categories = $user->productCategories;

        return view('product.editProduct', compact('user', 'product', 'categories'));
    }

    /**
     * @param int $userId
     * @param int $product
     * @param UpdateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Patch product
     */
    public function editProduct(int $userId, int $productId, UpdateProductRequest $request)
    {
        $product = Product::where('id', $productId)->first();

        //Не работает из за того что приходит id а не экземпляр продукта???WTF???
        if($request->additional_photos) {
            $totalPhoto = $product->checkCountAdditionalPhotosInProduct($product, $request->additional_photos, $product->imgPath($userId), $this->uploadService);
            if($totalPhoto !== null) {
                return redirect()->back()->with( 'count', 'Максимальное кол-во дополнительных фотографий 5 шт. Вы можете загрузить ' . $totalPhoto . ' фотографии для текущего товара');
            }
        }

        $product->patchProduct($userId, $product, $request, $this->uploadService);

        return redirect()->route('allProducts', ['id' => $userId])->with('success',$product->title . '" успешно обновлен!');
    }

    /**
     * Удаление дополнительных фотографий
     *
     * @param int $userId
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAdditionalPhoto(int $userId, Product $product, Request $request)
    {
        $product->dropAdditionalPhoto($product, $request->photo, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Удалить продукт
     *
     * @param int $userId
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct(int $userId, Product $product)
    {
        if($product->count > 0) {
            $this->productSoftDelete($product);
            return redirect()->back();
        }
        $product->dropProduct($product, $this->uploadService);

        return redirect()->back();
    }

    public function productSoftDelete(Product $product)
    {
        $product->delete = true;
        $product->save();
    }

    /**
     * Show product order form
     *
     * @param User $user
     * @param Product $product
     * @return View
     */
    public function showProductOrderForm(User $user, Product $product): View
    {
        return view('product.showProduct', compact('user', 'product'));
    }

    public function searchProducts(int $userId, Request $request)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $products = Product::search($request->search)->where('user_id', $user->id)->where('delete', null)->orderBy('id', 'desc')->get();

        return view('product.search', compact('user', 'products'));
    }

    public function statsProducts(int $userId, Product $product)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $stats = StatsService::getProductStatistic($user, $product);

        return view('product.stat-product', compact('user', 'stats'));
    }

    /**
     * Products in category
     *
     * @param User $user
     * @param string $categorySlug
     * @return View
     */
    public function showProductsInCategory(User $user, string $categorySlug): View
    {
        if($categorySlug == ProductCategory::DEFAULT_CATEGORY_SLUG) {
            $products = $user->userProducts();
            return view('categories.search-result', compact('user', 'categorySlug', 'products'));
        }

        $productCategory = ProductCategory::where('slug', $categorySlug)->firstOrFail();

        $products = $productCategory->products;

        return view('categories.search-result', compact('user', 'categorySlug', 'productCategory', 'products'));
    }

    public function sortProduct(int $id)
    {
        if(isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                Product::where('user_id', $id)->where('id', $index)->update([
                    'position' => $newPosition,
                ]);
            }
        }
    }
}


