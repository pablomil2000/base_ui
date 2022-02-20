<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Likes;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // Mostrar Post Inicio
    public function index(){
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $likes = Likes::where('user_id', auth()->user()->id)->get();
        return view('home', compact('posts', 'likes'));
    }
    public function show($id){
        $post = Post::find($id);
        // return $posts;
        $likes = Likes::where('user_id', auth()->user()->id)->get();
        return view('post.show', compact('post', 'likes'));
    }

    // Publicar nuevo Post
    public function upload(){
        return view('post.upload');
    }
    public function publish(Request $request){

        $validatedData = $request->validate([
            'description' => ['required', 'string'],
        ]);

        $fichero = $request->file("image");
        $ruta = public_path() . "\image\Post/";
        $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
        $movido = $fichero->move($ruta, $nombre_fichero);
        // return $movido;

        $post = new Post();
        $post->url = $nombre_fichero;
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->save();

        $message = 'Post Publicado';
        return redirect(url('/home'))-> with(compact("message"));
    }
}
