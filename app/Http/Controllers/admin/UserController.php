<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show($id){
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $cursos = $user->Recipes();
        return view('user.show', compact('user', compact('cursos')));
    }

    public function update(request $request){
        $user = User::findOrFail($request->id);
        
        $request->validate([
            'balance' => 'required|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->balance = $request->balance;

        if($request->hasFile('image')){

            if ($user->image != 'default.png') {
                // eliminar imagen de la carpeta public/images
                $path = public_path() . '/img/users/' . $user->image;
                unlink($path);
            }

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/users/');
            $image->move($destinationPath, $name);
            $user->image = $name;
        }

        $user->save();
        return back()->with('success', 'Datos actualizados');
    }
}