<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');   //solo si el usuario esta auth
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function loadUser(){
        $posts = Post::where('fechaPublicacion', '<=', date('Y-m-d'))->orderBy('fechaPublicacion', 'DESC')->paginate('5');
        return view('inicio', compact('posts'));
    }
}
