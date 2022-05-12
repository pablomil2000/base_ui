<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function inicio(){
        $num = 8;
        $PrimerosProducts = Product::take($num)->get();

        return view('inicio', compact('PrimerosProducts'));
    }

    public function shop(){
        $products = Product::paginate(12);
        return view('shop', compact('products'));
    }
}
