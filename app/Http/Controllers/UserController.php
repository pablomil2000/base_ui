<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function setting(){

        $user = User::find(auth()->user()->id);
        // return $user;
        return view('users.setting', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'nick' => ['required', 'string'],
            'email' => ['required', 'email'],
        ]);

        $user = User::find(auth()->user()->id);
        $ruta = "image/users/";

        if ($request->file("image")) {
            $fichero = $request->file("image");
            $ruta = public_path() . "\image\users/";
            $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
            $movido = $fichero->move($ruta, $nombre_fichero);
            // var_dump($ruta.$user->image);
            if ($user->image != "default.png") {
                File::delete($ruta . $user->image);
            }
        } else {
            $nombre_fichero = "default.png";
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nick= $request->nick;
        $user->email= $request->email;
        $user->image = $nombre_fichero;
        $user->save();
        $mensaje = "Imagen actualizada";
        // return $user;
        return back()->with(compact("mensaje"));
    }

    public function perfil(){

    }
}
