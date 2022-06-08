<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index()
    {
        $coches = Car::all();
        return view('cars.index', compact('coches'));
    }

    public function newCarForm(){
        return view('cars.new');
    }

    public function storage(Request $request){
        $car = new Car();
        $car->marca = $request->marca;
        $car->modelo = $request->model;
        $car->color = $request->color;
        $car->placa = $request->placa;
        $car->user_id = auth()->user()->id;
        $car->precioInicial = $request->precioInicial;

        if ($request->image) {
            $fichero = $request->file("image");
            $ruta = public_path() . "\img\cars/";
            $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
            $movido = $fichero->move($ruta, $nombre_fichero);
        }else {
            $nombre_fichero = 'default.png';
        }
        // var_dump($request->all());

        $car->image = $nombre_fichero;
        $car->save();


        return redirect('/cars');
    }

    public function find($id){
        $car = Car::findOrFail($id);
        return view('cars.find', compact('car'));
    }
}
