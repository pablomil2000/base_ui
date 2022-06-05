<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newForm()
    {
        return view('alumno.newForm');
    }

    public function new(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'fechaNac' => 'required',
        ]);

        $stuedent = new Student();
        $stuedent->name = $request->name;
        $stuedent->fechaNac = $request->fechaNac;
        $stuedent->save();
        return redirect('/listAlumno');
    }

    public function list()
    {
        $stuedents = Student::all();
        return view('alumno.listAlumno', compact('stuedents'));
    }
}
