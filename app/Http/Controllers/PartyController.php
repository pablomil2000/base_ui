<?php

namespace App\Http\Controllers;

use App\Models\Go;
use App\Models\Party;
use App\Models\Animator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyController extends Controller
{
    private $precioPorHora = '10';
    private $fijos = '200';

    public function newPartyform()
    {
        $animators = Animator::orderBy('specialty_id')->get();
        return view('newParty', compact('animators'));
    }

    public function newParty(request $request){

        // @dd($request->all());

        $validated = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'lugar' => 'required',
            'duracion' => 'required',
            'hora' => 'required',
        ]);


        // @dd($request->all());

        $precio = $this->fijos + ($this->precioPorHora * $request->duracion);
        
        $party = new Party;

        foreach ($request->animador as $key => $animador){
            $animator = Animator::findOrFail($key);
            // $party->Animators()->attach($animador);
            $precio += $animator->price;
        }

        $party->titulo = $request->titulo;
        $party->descripcion = $request->descripcion;
        $party->fecha = $request->fecha;
        $party->lugar = $request->lugar;
        $party->duracion = $request->duracion;
        $party->hora = $request->hora;
        $party->user_id = auth()->user()->id;
        $party->precio = $precio;
        $party->save();

        foreach ($request->animador as $key => $animador){
            $Go = new Go();
            $Go->party_id = $party->id;
            $Go->animator_id = $key;
            $Go->tiempo= $animador;
            $Go->save();
        }
        // return $party->id;
        return redirect(url('indexParties'));
    }

    public function index(){
        
        $parties = Party::where('user_id', auth()->user()->id)->get();
        return view('indexParties', compact('parties'));
    }

    public function delete($id){
        $party = Party::findOrFail($id);
        $party->delete();
        return redirect(url('indexParties'));
    }

    public function acept($id){
        $party = Party::findOrFail($id);
        $party->aceptada = true;
        $party->save();
        return redirect(url('indexParties'));
    }
}

