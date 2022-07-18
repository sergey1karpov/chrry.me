<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * [Description ShopController]
 */
class ShopController extends Controller
{
    public function shop()
    {
        return view('shop.main');
    }
}
