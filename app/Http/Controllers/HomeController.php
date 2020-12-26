<?php

namespace App\Http\Controllers;
use App\Products;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    }
    // public function MainPage(){
    //     $products=Products::get();
    //     return view('home.home', ["products" => $products]);
    // }
}
