<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getProfile($id){
        $user = User::findOrFail($id);
        return view('perfil', compact('user'));
    }

    public function editProfile(){
        $user = auth()->user();
        return view('editProfile', compact('user'));
    }

    public function uldateProfile(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        
        $ruta = "images/perfil/";
        var_dump($request->file('image'));
        
        if ($request->file("image")) {
            $fichero = $request->file("image");
            $ruta = public_path() . "\images\perfil/";
            $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
            $movido = $fichero->move($ruta, $nombre_fichero);
            if ($user->imgPerfil != "huevo1.png") {
                File::delete($ruta . $user->imgPerfil);
            }
        } else {
            $nombre_fichero = $user->imgPerfil;
        }
        
        $user->imgPerfil = $nombre_fichero;
        $user->nick = $request->nick;
        
        $user->save();


        // return $user;
        return redirect('users/'.$user->id);
    }
}
