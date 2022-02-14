<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galery;

class galeriesController extends Controller
{
    public function index(){
        $usuario = auth()->user()->id;
        $galleries = Galery::where('user_id', $usuario)->get();
        return view('galery.index', compact('galleries'));
    }

    public function create(Request $request){
        $usuario = auth()->user()->id;

        $gallery = new Galery();
        $gallery->user_id = $usuario;
        $gallery->title = $request->input('title');
        $gallery->descripcion = $request->input('description');

        $gallery->save();

        return back();
    }

    public function delete($id){
        $gallery = Galery::find($id);
        $gallery->delete();
        return back();
    }
    
    public function edit($id){
        $gallery = Galery::find($id);
        
        return view('galery.edit', compact('gallery'));
    }

    public function update(Request $request, $id){
        $gallery = Galery::find($id);
        
        $gallery->title = $request->input('title');
        $gallery->descripcion = $request->input('description');

        $gallery->save();

        return back();
    }
}
