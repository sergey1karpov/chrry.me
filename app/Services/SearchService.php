<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchService
{
    public function fullTextSearch(User $user, Request $request): Collection
    {
        return Product::search($request->search)
            ->where('user_id', $user->id)
            ->where('delete', null)
            ->orderBy('id', 'desc')
            ->get();
    }
}
