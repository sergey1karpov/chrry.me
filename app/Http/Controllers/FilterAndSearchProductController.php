<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Models\Filters\ProductFilters;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
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
        $products = Product::search($request->search)
            ->where('user_id', $user->id)
            ->where('delete', null)
            ->orderBy('id', 'desc')
            ->get();

        $search = $request->search;

        return view('categories.search-result', compact('user', 'products', 'search'));
    }

    /**
     * Here we make filtered the result of the FullText.
     * In $request->query('searchValue') we have a result a FullText search from method fullTextSearch()
     *
     * @param string $slug
     * @param ProductFilterRequest $request
     * @return View
     */
    public function fullTextFilter(string $slug, ProductFilterRequest $request): View
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $category = ProductCategory::where('name', $request->query('category'))->first();

        $search = $request->query('searchValue');

        $productsCollection = Product::search($request->searchValue)
            ->where('delete', null)
            ->where('user_id', $user->id)
            ->get();

        $products = ProductFilters::filter($category, $productsCollection, $request);

        return view('categories.search-result', compact('user', 'products', 'search'));
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

        $productCategory = ProductCategory::where('slug', $request->categorySlug)->first();//Текущая категория

        if($productCategory->slug == 'all') {
            $productsCollection = Product::where('user_id', $user->id)
                ->where('delete', null)
                ->get();

            $products = ProductFilters::filter($productCategory, $productsCollection, $request);

            return view('categories.search-result', compact('user', 'products', 'productCategory', 'categorySlug'));
        }

        $productsCollection = Product::where('user_id', $user->id)
            ->where('delete', null)
            ->where('product_categories_id', $productCategory->id)
            ->get();

        $products = ProductFilters::filter($productCategory, $productsCollection, $request);

        return view('categories.search-result', compact('user', 'products', 'productCategory', 'categorySlug'));
    }
}
