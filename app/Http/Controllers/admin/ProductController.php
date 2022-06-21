<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){

            if (!$product->UrlImages) {
                // eliminar imagen de la carpeta public/images
                $path = public_path() . '/images/' . $product->image;
                unlink($path);
            }

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->image = $name;
        }
        
        $product->save();

        return redirect()->route('admin.product.list');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        if (!$product->UrlImages) {
            // eliminar imagen de la carpeta public/images
            $path = public_path() . '/images/' . $product->image;
            unlink($path);
        }
        $product->delete();
        return redirect()->route('admin.product.list');
    }

    public function newForm(){

        $categories = Category::all();
        return view('admin.products.new', compact('categories'));

    }

    public function new(request $request){
        $product = new Product();

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->image = $name;
        }
        
        $product->save();

        return redirect()->route('admin.product.list');
    }
}
