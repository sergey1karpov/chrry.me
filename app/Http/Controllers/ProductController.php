<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Services\ProductFilters;
use App\Services\StatsService;
use App\Services\UploadPhotoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * @param string $slug слаг юзера
     * @param string $categorySlug слаг категории передаем в скрытое поле формы и потом по нему ищем в текущей категории
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Продукты категории
     */
    public function showProductsInCategory(string $slug, string $categorySlug)
    {
        $user = User::where('slug', $slug)->firstOrFail(); //Текущий юзер

        $productCategory = ProductCategory::where('slug', $categorySlug)->firstOrFail(); //Текущая категория

        $products = $productCategory->products;

        $links = DB::table('links')->where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get(); //Ссылки

        return view('categories.search-result', compact('user', 'categorySlug', 'links', 'productCategory', 'products'));
    }

    /**
     * @param string $slug
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Полнотекстовый поиск, во вьюху передаём параметр $search в котором лежит то, что мы искали и суем это
     * в скритое поле формы для фильтрации по нему
     */
    public function fullTextSearch(string $slug, Request $request)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $products = Product::search($request->search)
            ->where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();

        $search = $request->search;

        return view('categories.search-result', compact('user', 'products', 'search'));
    }

    /**
     * @param string $slug
     * @param ProductFilterRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Фильтрация результата полнотекстового поиска, в $request->query('searchValue') у нас то, что мы искали в полнотексте
     * и то что мы записали в скрытое поле в методе fullTextSearch()
     */
    public function fullTextFilter(string $slug, ProductFilterRequest $request)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $category = ProductCategory::where('name', $request->query('category'))->first();

        $search = $request->query('searchValue');

        $productsCollection = Product::search($request->searchValue)
            ->where('user_id', $user->id)
            ->get();

        $products = ProductFilters::filter($category, $productsCollection, $request);

        return view('categories.search-result', compact('user', 'products', 'search'));
    }

    /**
     * @param string $slug
     * @param ProductFilterRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Фильтрация отдельной категории. После перехода по категориям мы получаем их slug, и записываем в скрытое поле
     * и проверяем если он есть то фильтруем категорию
     */
    public function categoryFilter(string $slug, ProductFilterRequest $request)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $categorySlug = $request->categorySlug;

        $productCategory = ProductCategory::where('slug', $request->categorySlug)->first(); //Текущая категория

        $productsCollection = Product::where('user_id', $user->id)
            ->where('product_categories_id', $productCategory->id)->get();

        $products = ProductFilters::filter($productCategory, $productsCollection, $request);

        return view('categories.search-result', compact('user', 'products', 'productCategory', 'categorySlug'));
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


