<?php

namespace App\Services;

class ProductFilters
{
    public static function filter($category, $productsCollection, $request)
    {
        $productsQuery = $productsCollection->toQuery();

        //Категория
        if ($category) {
            if ($request->filled('category')) {
                $productsQuery->where('product_categories_id', '=', $category->id);
            }
        }

        //Минимальная цена
        if ($request->filled('min')) {
            $productsQuery->where('price', '>=', $request->query('min'));
        }

        //Максимальная цена
        if ($request->filled('max')) {
            $productsQuery->where('price', '<=', $request->query('max'));
        }

        //Новые-старые
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
