<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function allCategories(int $userId)
    {
        $user = User::find($userId);

        $categories = $user->productCategories;

        return view('categories.all-categories', compact('user', 'categories'));
    }

    public function createCategory(int $userId, Request $request)
    {
        $category = new ProductCategory(['name' => $request->name, 'slug' => $request->slug]);

        $user = User::find($userId);

        $user->productCategories()->save($category);

        return redirect()->back()->with('success', 'Категория создана');
    }

    public function editCategory(int $userId, ProductCategory $category, Request $request)
    {
        $category->update(['name' => $request->name, 'slug' => $request->slug]);

        return redirect()->back()->with('success', 'Категория обновлена');
    }

    public function deleteCategory(int $userId, ProductCategory $category)
    {
        if($category->slug != 'all') {
            return redirect()->back()->with('success', 'У нас так не принято');
        }

        $category->delete();

        return redirect()->back()->with('success', 'Категория удалена');
    }

    public function sortCategory(int $userId)
    {
        if(isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                ProductCategory::where('user_id', $userId)->where('id', $index)->update([
                    'position' => $newPosition,
                ]);
            }
        }
    }
}
