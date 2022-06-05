<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newForm()
    {
        return view('professor.newForm');
    }

    public function new(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'tlf' => 'required | min: 9 | max: 9',
        ]);

        $profesor = new Professor();
        $profesor->name = $request->name;
        $profesor->tlf = $request->tlf;
        $profesor->save();

        return redirect('/listProfessor');
    }

    public function list()
    {
        $profesores = Professor::all();
        return view('professor.listProfessor', compact('profesores'));
    }
}
