<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function registrarWaiter(Request $request)
    {

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
        $user->password = bcrypt($request->password);
        $user->save();

        return back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
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

    public function delete($id)
    {
        $users = User::find($id)->where('admin', '0')->get();
        foreach ($users as $user){
            $user->delete();
        }
        return back();
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);
        return view('admin.profile', compact('user'));
    }

    public function adminUpdate(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $ruta = "image/users/";

        if ($request->bor) {
            if ($user->image != "default.png") {
                File::delete($ruta . $user->image);
            }
            $user->image = "default.png";
            $user->save();
            $mensaje = "Imagen actualizada";
            return back()->with(compact("mensaje"));
        }

        if ($request->file("image")) {
            $fichero = $request->file("image");
            $ruta = public_path() . "\image\users/";
            $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
            $movido = $fichero->move($ruta, $nombre_fichero);
            // var_dump($ruta.$user->image);
            if ($user->image != "default.png") {
                File::delete($ruta . $user->image);
            }
        } else {
            $nombre_fichero = "default.png";
        }

        $user->image = $nombre_fichero;
        $user->save();
        $mensaje = "Imagen actualizada";
        return back()->with(compact("mensaje"));




        // return back()->with(compact("mensaje"));
    }
}
