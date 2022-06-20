<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $products = Product::paginate(7);
        return view('admin.products.index', compact('products'));
    }

    public function edit($id){
        $products = Product::findOrFail($id);

        return view('admin.products.edit', compact('products'));
    }
}
