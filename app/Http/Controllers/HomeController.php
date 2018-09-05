<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

     public function main()
    {
        return view('frontend.home.home');
    }
     public function about()
    {
        return view('frontend.about.about');
    }
     public function category()
    {
        return view('frontend.category.category');
    }
    public function contact()
    {
        return view('frontend.contact.contact');
    }
}
