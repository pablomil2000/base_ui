<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCar(){
        $car = auth()->user()->cars->where('fecha_fin', '=', null)->first();

        $carro = $car->carDetails;

        return view('carDetail', compact('carro'));
    }
}
