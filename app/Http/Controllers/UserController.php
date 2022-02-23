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
        $mensaje = "Imagen subida";
        // return $user;
        return back()->with(compact("mensaje"));
    }

    public function like($id) {
        $user = auth()->user();
        $likes = \DB::select('SELECT * from post_user WHERE post_id = ' . $id. ' and user_id =  '.$user->id);
        if (!$likes) {
            $message = 'Te gusta este post';
            $user->Postlikes()->attach($id);
        }else {
            $message = 'Ya no te gusta este post';
            $user->Postlikes()->detach($id);
        }

        return redirect(url('/home'))-> with(compact("message"));
    }

    public function perfil(){
        $user = User::find(auth()->user()->id);
        // return $user;
        return view('users.perfil', compact('user'));
    }
}
