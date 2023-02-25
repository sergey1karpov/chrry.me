<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function instruction()
    {
        return view('instruction');
    }

    public function contacts()
    {
        return view('index.contacts');
    }

    public function sendContactMail()
    {

    }

    public function aboutUs()
    {

    }

    public function rules()
    {
        return view('index.rules');
    }
}
