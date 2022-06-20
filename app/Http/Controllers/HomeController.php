<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //mis metodos
    public function inicio(){
        $categorias = Category::all();
        $productos = Product::latest()->take(8)->get();
        return view('inicio', compact('categorias', 'productos'));
    }

    public function shop(){
        $productos = Product::paginate(20);
        return view('shop', compact('productos'));
    }

    public function shopFilter($slug){
        $category = Category::where('slug', $slug)->first();
        $productos = $category->products()->paginate(20);
        $texto = 'productos de la categoria <u>'.$category->name .'</u>';
        return view('shop', compact('productos', 'texto'));
    }
}
