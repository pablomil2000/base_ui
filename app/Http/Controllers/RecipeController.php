<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    public function show($id){
        $id = auth()->user()->id;
        $cursos = Recipe::findOrFail($id);

        return view('cursos.show', compact('cursos'));
    }

    public function inscribir($id){
        $cursos = Recipe::findOrFail($id);
        $user = auth()->user();

        if ($cursos->capacidad > count($cursos->inscritos)) {

            $cursos_Apun= $user->CursosApuntados;

            foreach ($cursos_Apun as $curs){
                if ($curs->recipe_id == $cursos->id) {
                    return back()->with('error', 'Ya estas en este curso');
                }
            }

            if ($user->balance >= $cursos->precio) {
                $cursos->UsersApuntados()->attach($user);
                
                $user->balance = $user->balance - $cursos->precio;
                $user->save();

                return back()->with('success', 'Te has sido inscrito al curso');
            }else{
                return back()->with('error', 'No tienes suficiente dinero');
            }
        } else {
            return back()->with('error', 'El curso está lleno');
        }
        // return back()->with('success', 'Te has inscrito al curso de '. $cursos->name);
    }

    public function delete($id){
        $cursos = Recipe::findOrFail($id);
        $user = auth()->user();

        $cursos->UsersApuntados()->detach($user);
        $user->balance = $user->balance + $cursos->precio;
        $user->save();

        return back()->with('success', 'Te has desinscrito del curso');
    }
}
