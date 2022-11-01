<?php

namespace App\Http\Controllers;

use App\Exceptions\NotLinkProductException;
use App\Http\Requests\OrderProductRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Services\StatsService;
use App\Services\UploadPhotoService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    public $uploadService;

    public function __construct(UploadPhotoService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

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

        $products = Product::where('user_id', $userId)->orderBy('position')->get();

        return view('product.products', compact('user', 'products'));
    }

    public function showProduct(int $userId, Product $product)
    {
        $user = User::findOrFail($userId);

        return view('product.editProduct', compact('user', 'product'));
    }

    /**
     * @param int $userId
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Patch product
     */
    public function editProduct(int $userId, Product $product, UpdateProductRequest $request)
    {
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
        $product->dropProduct($product, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Показать продукт и форму для отправки заявки
     *
     * @param $slug
     * @param $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function showProductDetails($slug, $product) {

        $user = User::where('slug', $slug)->first();

        $product = Product::where('user_id', $user->id)->where('id', $product)->first();

        if($product->link_to_order_text) {
            return view('product.showProduct', compact('user', 'product'));
        } else {
            abort(404);
        }

    }

    public function searchProducts(int $userId, Request $request)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $products = Product::search($request->search)->where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('product.search', compact('user', 'products'));
    }

    public function statsProducts(int $userId, Product $product)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $stats = StatsService::getProductStatistic($user, $product);

        return view('product.stat-product', compact('user', 'stats'));
    }

    public function showProductsInCategory(string $slug, string $categorySlug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $categories = $user->productCategories;

        $prod = ProductCategory::where('slug', $categorySlug)->firstOrFail();

        $products = $prod->products;

        return view('categories.search-result', compact('user', 'products', 'categorySlug', 'categories'));
    }

    public function search(string $slug, ProductFilterRequest $request)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $categories = $user->productCategories;

        $links = \DB::table('links')->where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get();

        if($request->search != null) {
            $products = Product::search($request->search)
                ->where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->get();

            $search = $request->search;

            return view('categories.search-result', compact('user', 'products', 'categories', 'search', 'links'));
        } else {
            $category = ProductCategory::where('name', $request->query('category'))->first();

            if(!$category) {
                return redirect()->back();
            }

            $search = $request->query('searchValue');

            $productsCollection = Product::search($request->searchValue)
                ->where('user_id', $user->id)
                ->get();

            $productsQuery = $productsCollection->toQuery();

            if($request->filled('category')) {
                $productsQuery->where('product_categories_id', '=', $category->id);
            }
            if($request->filled('min')) {
                $productsQuery->where('price', '>=', $request->query('min'));
            }
            if($request->filled('max')) {
                $productsQuery->where('price', '<=', $request->query('max'));
            }
            if($request->filled('date_pub')) {
                if($request->query('date_pub') == 'Новые') {
                    $productsQuery->orderBy('id', 'desc');
                }
                if($request->query('date_pub') == 'Старые') {
                    $productsQuery->orderBy('id');
                }
            }

            $products = $productsQuery->get();

            return view('categories.search-result', compact('user', 'products', 'categories', 'search', 'links'));
        }

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


