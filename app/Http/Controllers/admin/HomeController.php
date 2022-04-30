<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function loadAdmin(){
        $posts = Post::all();

        
        $visitas = Post::totalVisitas();
        $cantidadPosts = Post::numPost();
        $numUsuarios = User::numUsuarios();
        return view('admin.index', compact('posts', 'cantidadPosts', 'visitas', 'numUsuarios'));
    }
}
