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
}
