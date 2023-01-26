<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Services\PropertiesService;
use App\Services\StatsService;
use App\Services\UploadPhotoService;
use App\Traits\IconsAndFonts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    use IconsAndFonts;

    public function __construct(
        private UploadPhotoService $uploadService,
        public PropertiesService            $propertiesService,
        private Product            $product,
    ) {}

    /**
     * Show create product form
     *
     * @param User $user
     * @return View
     */
    public function createProductForm(User $user): View
    {
        $allFontsInFolder = $this->getFonts();

        return view('product.add-product', compact('user', 'allFontsInFolder'));
    }

    /**
     * Create new product
     *
     * @param User $user
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function addProduct(User $user, ProductRequest $request, Product $product): RedirectResponse
    {
        $product->storeProduct($user, $request, $this->uploadService, $this->propertiesService);

        return redirect()->route('editProfileForm', ['user' => $user->id])->with('success', 'Товар успешно добавлен');
    }

    /**
     * Show all products in admin panel
     *
     * @param User $user
     * @return View
     */
    public function allProducts(User $user): View
    {
        return view('product.products', [
            'user' => $user,
            'products' => Product::where('user_id', $user->id)->where('delete', null)->orderBy('position')->paginate(30)
        ]);
    }

    /**
     * Show product in front
     *
     * @param User $user
     * @param Product $product
     * @return View
     */
    public function showProductDetails(User $user, Product $product): View
    {
        $designProduct = unserialize($product->getLastProductDesignFields($user));

        return view('product.product-details', compact('user', 'product', 'designProduct'));
    }

    /**
     * Show update product form
     *
     * @param User $user
     * @param Product $product
     * @return View
     */
    public function showProduct(User $user, Product $product): View
    {
        $categories = $user->productCategories;

        $designProduct = unserialize($product->design_properties);

        $allFontsInFolder = $this->getFonts();

        return view('product.editProduct', compact('user', 'product', 'categories', 'designProduct', 'allFontsInFolder'));
    }

    /**
     * Update product
     *
     * @param User $user
     * @param Product $product
     * @param UpdateProductRequest $request
     * @return RedirectResponse
     */
    public function editProduct(User $user, Product $product, UpdateProductRequest $request): RedirectResponse
    {
        if($request->additional_photos) {
            if(count($request->additional_photos) > $product->countFreeSpace($product)) {
                return redirect()->back()->with( 'count', 'Максимальное кол-во дополнительных фотографий 5 шт. Вы можете загрузить ' . $product->countFreeSpace($product) . ' фотографии для текущего товара');
            }
            $product->uploadAdditionalPhotos($product, $request->additional_photos, $product->imgPath($user->id), $this->uploadService);
        }

        $product->patchProduct($user, $product, $request, $this->uploadService, $this->propertiesService);

        return redirect()->route('allProducts', ['user' => $user->id])->with('success',$product->title . '" успешно обновлен!');
    }

    /**
     * Delete additional photo
     *
     * @param User $user
     * @param Product $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteAdditionalPhoto(User $user, Product $product, Request $request): RedirectResponse
    {
        $product->dropAdditionalPhoto($product, $request->photo, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Delete product
     * But if count filed(count orders) > 0 we make soft delete
     *
     * @param User $user
     * @param Product $product
     * @return RedirectResponse
     */
    public function deleteProduct(User $user, Product $product)
    {
        $product->dropProduct($product, $this->uploadService);

        return redirect()->back();
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

    /**
     * Full text product search
     *
     * @param User $user
     * @param Request $request
     * @return View
     */
    public function searchProducts(User $user, Request $request): View
    {
        $products = Product::search($request->search)->where('user_id', $user->id)->where('delete', null)->orderBy('id', 'desc')->get();

        return view('product.search', compact('user', 'products'));
    }

    /**
     * Get product view stat
     *
     * @param User $user
     * @param Product $product
     * @return View
     */
//    public function statsProducts(User $user, Product $product): View
//    {
//        return view('product.stat-product', compact('user', 'product'));
//    }

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
            $products = Product::where('user_id', $user->id)
                ->where('delete', null)
                ->paginate(20);

            return view('categories.search-result', compact('user', 'categorySlug', 'products'));
        }

        $productCategory = ProductCategory::where('user_id', $user->id)->where('slug', $categorySlug)->firstOrFail();

        $products = Product::where('user_id', $user->id)
            ->where('product_categories_id', $productCategory->id)
            ->where('delete', null)
            ->paginate(20);

        return view('categories.search-result', compact('user', 'categorySlug', 'productCategory', 'products'));
    }

    /**
     * @param User $user
     * @return Application|Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function massUpdateForm(User $user)
    {
        if(count($user->products) > 0) {
            return view('product.mass-edit', [
                'user' => $user,
                'allFontsInFolder' => $this->getFonts(),
                'designProduct' => unserialize($this->product->getLastProductDesignFields($user)),
            ]);
        }

        abort(403, 'У вас нет доступных продуктов для их изменения');
    }

    /**
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function massUpdate(User $user, Request $request)
    {
        $this->product->massUpdate($user, $request, $this->propertiesService);

        return redirect()->back();
    }

    public function sortProduct(User $user)
    {
        if(isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                Product::where('user_id', $user->id)->where('id', $index)->update([
                    'position' => $newPosition,
                ]);
            }
        }
    }
}


