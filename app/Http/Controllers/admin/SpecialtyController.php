<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    public function index()
    {
        $especialidades = Specialty::all();

        return view('admin.specialties.index', compact('especialidades'));
    }

    public function newForm(){
        return view('admin.specialties.new');
    }

    public function newSpecialties(request $request){

        $validated = $request->validate([
            'name' => 'required|unique:specialties',
        ]);

        $especialidade = new Specialty();
        $especialidade->name = $request->name;
        $especialidade->save();

        return redirect(Route('specialties'))->with('message', 'Especialidad creada!');;
    }

    public function deleteSpecialties($id){
        $especialidade = Specialty::find($id);
        $especialidade->delete();

        return redirect(Route('specialties'))->with('message', 'Especialidad eliminada!');;
    }

    public function editForm($id){
        $especialidade = Specialty::find($id);
        return view('admin.specialties.edit', compact('especialidade'));
    }

    public function update(Request $request, $id){

        $especialidade = Specialty::find($id);

        $validated = $request->validate([
            'name' => 'required|unique:specialties',
        ]);

        $especialidade->name = request('name');
        $especialidade->save();

        return redirect(Route('specialties'))->with('message', 'Especialidad actualizada!');;
    }
}
