<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {

    }

    //
    public function main()
    {
        return view('main');
    }

    //
    public function about()
    {
        return view('about');
    }

    //
    public function contact()
    {
        return view('contact');
    }

    //
    public function home()
    {
        return view('home');
    }

    //
    public function page404()
    {
        return view('404');
    }
}
