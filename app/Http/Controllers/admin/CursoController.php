<?php

namespace App\Http\Controllers\admin;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{
    public function view($id){
        $cursos = Recipe::findOrFail($id);
        return view('admin.cursos.edit', compact('cursos'));
    }

    public function edit(request $request){
        $cursos = Recipe::findOrFail($request->id);

        var_dump($request->all());
        $cursos->name = $request->name;
        $cursos->description_C = $request->description_C;
        $cursos->description_L = $request->description_L;

        $cursos->precio = $request->precio;
        $cursos->estado = $request->estado;

        $cursos->save();

        return back()->with('success', 'Curso actualizado correctamente');
    }

    public function new(){
        return view('admin.cursos.newCurso');
    }
}
