<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function loadAdmin(){
        $posts = Post::Where('user_id','=', auth()->user()->id)->get();
        $fecha = Carbon::now()->format('Y');

        $visitas = 0;
        foreach ($posts as $post) {
            $visitas += $post->visitas;
        }

        // $visitas = Post::totalVisitas();
        $cantidadPosts = Post::all()->count();
        $numUsuarios = User::all()->count();

        $roles = auth()->user()->roles;

        return view('admin.index', compact('roles', 'fecha', 'posts', 'cantidadPosts', 'visitas', 'numUsuarios'));
    }
}
