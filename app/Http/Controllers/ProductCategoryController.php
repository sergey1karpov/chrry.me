<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Services\UploadPhotoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct(
        private readonly Product $pr,
        private readonly UploadPhotoService $photoService
    ) {}

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allCategories(User $user)
    {
        $categories = $user->productCategories;

        return view('categories.all-categories', compact('user', 'categories'));
    }

    /**
     * @param User $user
     * @param ProductCategoryRequest $request
     * @return RedirectResponse
     */
    public function createCategory(User $user, ProductCategoryRequest $request)
    {
        $category = new ProductCategory(['name' => $request->name, 'slug' => $request->slug]);

        $user->productCategories()->save($category);

        return redirect()->back()->with('success', 'Категория создана');
    }

    /**
     * @param User $user
     * @param ProductCategory $category
     * @param ProductCategoryRequest $request
     * @return RedirectResponse
     */
    public function editCategory(User $user, ProductCategory $category, ProductCategoryRequest $request): RedirectResponse
    {
        $category->update(['name' => $request->name, 'slug' => $request->slug]);

        return redirect()->back()->with('success', 'Категория обновлена');
    }

    /**
     * @param User $user
     * @param ProductCategory $category
     * @return RedirectResponse
     */
    public function deleteCategory(User $user, ProductCategory $category)
    {
        if($category->slug == 'all') {
            return redirect()->back()->with('success', 'No! no, no... Please stop');
        }

        $this->deleteRelationProducts($user, $category);

        $category->delete();

        return redirect()->back()->with('success', 'Category has been deleted!');
    }

    /**
     * @param User $user
     * @param ProductCategory $category
     * @return void
     */
    public function deleteRelationProducts(User $user, ProductCategory $category)
    {
        $productsInCategory = Product::where('user_id', $user->id)->where('product_categories_id', $category->id)->get();
        foreach ($productsInCategory as $product) {
            $this->pr->dropProduct($product, $this->photoService);
        }
    }

    public function sortCategory(User $user)
    {
        if(isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                ProductCategory::where('user_id', $user->id)->where('id', $index)->update([
                    'position' => $newPosition,
                ]);
            }
        }
    }
}
