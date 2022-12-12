<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Models\Filters\ProductFilters;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

/**
 * Filter and Search products
 */
class FilterAndSearchProductController extends Controller
{
    /**
     * FullText search, we send the parameter $search to the view.
     * Parameter $search has our search request, and this request we include in hidden field for filter for him
     *
     * @param User $user
     * @param Request $request
     * @return View
     */
    public function fullTextSearch(User $user, Request $request): View
    {
        return view('categories.search-result', [
            'user' => $user,
            'products' => $this->productSearch($request->search, $user),
            'search' => $request->search,
        ]);

    }

    /**
     * Here we make filtered the result of the FullText.
     * In $request->query('searchValue') we have a result a FullText search from method fullTextSearch()
     *
     * @param User $user
     * @param ProductFilterRequest $request
     * @return View
     */
    public function fullTextFilter(User $user, ProductFilterRequest $request): View
    {
        $category = ProductCategory::where('user_id', $user->id)
            ->where('name', $request->query('category'))
            ->first();

        $productsCollection = $this->productSearch($request->searchValue, $user);

        return view('categories.search-result', [
            'user' => $user,
            'search' => $request->searchvalue,
            'products' => ProductFilters::filter($category, $productsCollection, $request),
        ]);
    }

    /**
     * @param string $search
     * @param User $user
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function productSearch(string $search, User $user): LengthAwarePaginator
    {
        return Product::search($search)
            ->where('user_id', $user->id)
            ->where('delete', null)
            ->orderBy('position')
            ->paginate(20);
    }

    /**
     * Filter the category
     * After the transition from categories we have category slug, and write him in hidden input
     * and check this, if catecory slug is true, we make filter the category
     *
     * @param User $user
     * @param ProductFilterRequest $request
     * @return View
     */
    public function categoryFilter(User $user, ProductFilterRequest $request): View
    {
        $categorySlug = $request->categorySlug;

        $productCategory = ProductCategory::where('user_id', $user->id)->where('slug', $request->categorySlug)->first();

        if($productCategory->slug == 'all') {
            $products = $this->withOutCategoryFilter($user, $productCategory, $request);

            return view('categories.search-result', compact('user', 'products', 'productCategory', 'categorySlug'));
        }

        $products = $this->withCategoryFilter($user, $productCategory, $request);

        return view('categories.search-result', compact('user', 'products', 'productCategory', 'categorySlug'));
    }

    /**
     * @param User $user
     * @param ProductCategory $productCategory
     * @param ProductFilterRequest $request
     * @return LengthAwarePaginator
     */
    public function withOutCategoryFilter(User $user, ProductCategory $productCategory, ProductFilterRequest $request): LengthAwarePaginator
    {
        $productsCollection = Product::where('user_id', $user->id)
            ->where('delete', null)
            ->orderBy('position')
            ->get();

        $filteredProducts = ProductFilters::filter($productCategory, $productsCollection, $request);

        return $this->paginate($filteredProducts);
    }

    /**
     * @param User $user
     * @param ProductCategory $productCategory
     * @param ProductFilterRequest $request
     * @return LengthAwarePaginator
     */
    public function withCategoryFilter(User $user, ProductCategory $productCategory, ProductFilterRequest $request): LengthAwarePaginator
    {
        $productsCollection = Product::where('user_id', $user->id)
            ->where('delete', null)
            ->where('product_categories_id', $productCategory->id)
            ->orderBy('position', 'DESC')
            ->get();

        $filteredProducts = ProductFilters::filter($productCategory, $productsCollection, $request);

        return $this->paginate($filteredProducts);
    }

    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => url()->full(),
            'pageName' => 'page',
        ]);
    }
}
