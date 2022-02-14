<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{
    public function update(Request $request){

        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->pregunta = $request->input('pregunta');
        $user->respuesta = $request->input('respuesta');
        $user->save();

        return back();
    }
}
