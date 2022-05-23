<?php

namespace App\Http\Controllers\Admin;

use App\Models\Animator;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimatorController extends Controller
{

    public function index(){
        $animators = Animator::all();
        return view('admin/animator/index', compact('animators'));
    }

    public function newForm()
    {
        $especialidades = Specialty::all();

        return view('admin.animator.newAnimador', compact('especialidades'));
    }

    public function newAnimator(Request $request){
            
            $validated = $request->validate([
                'name' => 'required',
                'price' => 'required|min:value:500',
                'specialty_id' => 'required',
            ]);
    
            $animador = new Animator();
            $animador->name = $request->name;
            $animador->price = $request->price;
            $animador->specialty_id = $request->specialty_id;
            $animador->save();
    
            return redirect(Route('Animador'))->with('message', 'Animador creado!');;
    }

    public function deleteAnimador($id){
        $animador = Animator::find($id);
        $animador->delete();
        return redirect(Route('Animador'))->with('message', 'Animador eliminado!');;
    }

    public function editAnimador($id){
        $animador = Animator::find($id);
        $especialidades = Specialty::all();
        return view('admin.animator.editAnimador', compact('animador', 'especialidades'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|min:value:500',
            'specialty_id' => 'required',
        ]);

        $animador = Animator::find($id);
        $animador->name = $request->name;
        $animador->price = $request->price;
        $animador->specialty_id = $request->specialty_id;
        $animador->save();

        return redirect(Route('Animador'))->with('message', 'Animador actualizado!');;
    }
}
