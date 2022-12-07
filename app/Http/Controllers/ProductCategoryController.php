<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function allCategories(User $user)
    {
        $categories = $user->productCategories;

        return view('categories.all-categories', compact('user', 'categories'));
    }

    public function createCategory(User $user, ProductCategoryRequest $request)
    {
        $category = new ProductCategory(['name' => $request->name, 'slug' => $request->slug]);

        $user->productCategories()->save($category);

        return redirect()->back()->with('success', 'Категория создана');
    }

    public function editCategory(User $user, ProductCategory $category, ProductCategoryRequest $request)
    {
        $category->update(['name' => $request->name, 'slug' => $request->slug]);

        return redirect()->back()->with('success', 'Категория обновлена');
    }

    public function deleteCategory(User $user, ProductCategory $category)
    {
        if($category->slug == 'all') {
            return redirect()->back()->with('success', 'У нас так не принято');
        }

        $category->delete();

        return redirect()->back()->with('success', 'Категория удалена');
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
