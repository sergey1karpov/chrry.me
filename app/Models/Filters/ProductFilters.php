<?php

namespace App\Models\Filters;

use App\Models\ProductCategory;

class ProductFilters
{
    public static function filter($category, $productsCollection, $request)
    {
        $productsQuery = $productsCollection->toQuery();

        if ($category && $category->name != ProductCategory::DEFAULT_CATEGORY) {
            if ($request->filled('category')) {
                $productsQuery->where('product_categories_id', '=', $category->id);
            }
        }

        if ($request->filled('min')) {
            $productsQuery->where('price', '>=', $request->query('min'));
        }

        if ($request->filled('max')) {
            $productsQuery->where('price', '<=', $request->query('max'));
        }

        if ($request->filled('date_pub')) {
            if ($request->query('date_pub') == 'Новые') {
                $productsQuery->orderBy('id', 'desc');
            }
            if ($request->query('date_pub') == 'Старые') {
                $productsQuery->orderBy('id');
            }
        }

        return $productsQuery->get();
    }
}
