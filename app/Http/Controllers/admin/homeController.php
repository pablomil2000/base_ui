<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function Admin(){
        $categorias = Category::all();
        $productos = Product::latest()->take(8)->get();
        $usuarios = User::all();
        $cartDetails = CartDetails::all();

        $total = 0;
        foreach ($cartDetails as $cartDetail) {
            $total += $cartDetail->totalDetalle;
        }

        return view('admin.dashboard', compact('categorias', 'productos', 'usuarios', 'cartDetails', 'total'));
    }
}
