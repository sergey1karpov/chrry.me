<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Show main page of the site
     * @return View
     */
    public function welcome(): View
    {
        return view('welcome');
    }
}
