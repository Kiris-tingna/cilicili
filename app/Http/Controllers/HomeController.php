<?php

namespace App\Http\Controllers;

use App\Category;

class HomeController extends Controller
{

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::whereIsRoot()->get();

        return view('home', compact('category'));
    }


}
