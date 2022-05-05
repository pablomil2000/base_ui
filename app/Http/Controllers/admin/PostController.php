<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    //admin\\
    public function __construct(){
        $this->middleware('admin');
    }

    public function formuNewPost(){
        $categorias = Category::all();
        $fecha = Carbon::now()->format('Y');

        return view('admin.newPost', compact('fecha', 'categorias'));
    }

    public function newPost(Request $request){
        $categorias = Category::all();

        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'post' => 'required',
            'categoria' => 'required',
        ]);

        $post = new Post();
        $post->titulo = $request->titulo;
        $post->post = $request->post;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->categoria;
        $post->fechaPublicacion = $request->fecha;
        $post->save();
        $fecha = Carbon::now()->format('Y');
        
        return view('admin.newPost', compact('fecha','categorias'))->with('success', 'Post creado con exito!');
    }

    public function getPost($id){
        // $post = Post::findOrFail($id)->where('fechaPublicacion', '<=', date('Y-m-d'))->get();
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }

    public function editPost($id){
        $post = Post::where('user_id', '=', auth()->user()->id)->findOrFail($id);
        $categorias = Category::all();
        $fecha = Carbon::now()->format('Y');

        return view('admin.editPost', compact('fecha','post', 'categorias'));
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'post' => 'required',
            'categoria' => 'required',
        ]);

        $post = Post::findOrFail($request->id);
        $post->titulo = $request->titulo;
        $post->post = $request->post;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->categoria;
        $post->fechaPublicacion = $request->fecha;
        $post->save();

        return redirect('/admin/edit/'.$request->id)->with('success', 'Post actualizado con exito!');
    }

    public function deletePost($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/admin')->with('success', 'Post eliminado con exito!');
    }
}
