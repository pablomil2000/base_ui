<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartDetailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCar(Request $request){
        // var_dump($request->all());

        $user = auth()->user();
        $product = Product::findOrFail($request->product_id);
        $cart = cart::where('is_active', 1)->where('user_id', $user->id)->first();


        if (is_null($cart)) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->save();
        }

        $cartDetail = new CartDetails();
        $cartDetail->cart_id = $cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->cantidad;
        $cartDetail->price = $product->price;
        $cartDetail->save();

        return redirect()->route('cart');
    }

    public function show(){
        $user = auth()->user();

        $cart = cart::where('is_active', 1)->where('user_id', $user->id)->first();

        return view('cart.cartDetail', compact('cart'));
    }

    public function delete(Request $request){
        
        $cartDetail = CartDetails::findOrFail($request->id)->first();

        $cartDetail->delete();
        return back()->with('success', 'Producto eliminado del carrito');
    }
}
