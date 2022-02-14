<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function users(){
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function registrarWaiter(Request $request){

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'min:9', 'max:9'],
            'Salario' => ['required', 'int'],
            'Usuario' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->telefono = $request->telefono;
        $user->salario = $request->Salario;
        $user->username = $request->Usuario;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return back();
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        $validatedData = $request->validate([
            'telefono' => ['required', 'string', 'min:9', 'max:9'],
            'Salario' => ['required', 'int'],
        ]);

        $user->telefono = $request->telefono;
        $user->salario = $request->Salario;
        $user->save();
        return redirect(route('admin.users'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
