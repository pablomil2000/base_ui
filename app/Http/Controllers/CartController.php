<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkout(){

        $user = auth()->user();
        $cart = $user->CurrentCart;

        if(!$cart){
            return redirect()->route('shop')->with('error', 'You have no items in your cart');
        }

        $cart->is_active = 0;
        $cart->save();
        return redirect('/')->with('success', 'Tu pedido se ha realizado correctamente');
    }

    public function index(){
        $user = auth()->user();
        $carts = $user->Carts;

        return view('cart.index', compact('carts'));
    }

    public function show($id){
        $user = auth()->user();
        $cart = $user->Carts->findOrFail($id);

        return view('cart.cartDetail', compact('cart'));
    }
}
