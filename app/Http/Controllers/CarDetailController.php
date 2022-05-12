<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Product;
use App\Models\CarDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function addCar($id){
        $car = auth()->user()->cars->where('fecha_fin', '=', null)->first();

        if (empty($car)){
            $car = new Car();
            $car->user_id = auth()->user()->id;
            $car->save();
        }

        $product = Product::find($id);

        $detalle = new CarDetail();
        $detalle->car_id = $car->id;
        $detalle->product_id = $product->id;
        $detalle->cantidad = 1;
        $detalle->price = $product->price;
        $detalle->save();

        return Redirect(Route('car'));
    }
}
