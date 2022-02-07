<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(Request $request){
        $usuario = Auth::user();
        
        $usuario->name = $request->input('name');
        $usuario->surname = $request->input('surName');
        $usuario->nick = $request->input('nick');
        $usuario->email = $request->input('email');
        $fichero = $request->file('image');

        if ($fichero != '') {
            $ruta = public_path().'/img/users';
            $nombre_fichero = uniqid().'-'.$fichero->getClientOriginalName();   //bd
            $subido = $fichero->move($ruta,$nombre_fichero);
            
            if ($subido) {
                if ($usuario->img != 'user_default.png') {
                    // unlink($ruta.'/'.$usuario->img);
                }
                $usuario->img = $nombre_fichero;
            }
        }
        $usuario->save();
        return back();
    }
}
