<?php

namespace App\Http\Controllers;

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

    public function about()
    {
        return view('index.about');
    }

    public function rules()
    {
        return view('index.rules');
    }
}
