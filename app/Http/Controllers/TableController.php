<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\table;
use App\Models\User;

class TableController extends Controller
{
    public function index(){
            $tables = table::get();
            $camareros = User::where('admin', '=', 0)->get();
            return view('admin.tables.index', compact('tables', 'camareros'));
    }

    public function registrarTable(Request $request){

        $validatedData = $request->validate([
            'id' => ['required', 'integer'],
            'color' => ['required', 'string', 'min:7', 'max:7'],
            'camarero' => ['required', 'int'],
            'description' => ['string'],
        ]);

        $table = new table;
        $table->numMes = $request->id;
        $table->color= $request->color;
        $table->description = $request->description;
        $table->user_id = $request->camarero;
        $table->save();
        return back();
    }

    public function update(Request $request, $id){
        $table = Table::find($id);
        $validatedData = $request->validate([
            'id' => ['required', 'integer', 'unique:tables,numMes'],    //revisar
            'color' => ['required', 'string', 'min:7', 'max:7', 'unique:tables,color'],
            'camarero' => ['required', 'int'],
            'description' => ['string'],
        ]);

        $table->numMes = $request->id;
        $table->color= $request->color;
        $table->description = $request->description;
        $table->user_id = $request->camarero;
        $table->save();
        return redirect(route('admin.tables'));
    }

    public function edit($id){
        $table = Table::find($id);
        $camareros = User::where('admin', '=', 0)->get();
        return view('admin.tables.edit', compact('table', 'camareros'));
    }


    public function delete($id){
        $table = Table::find($id);
        $table->delete();
        return back();
    }
}
