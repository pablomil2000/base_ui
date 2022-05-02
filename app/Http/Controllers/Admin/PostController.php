<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::paginate(2);
        return view('admin.inicio', compact('posts'));
    }

    public function createForm()
    {
        return view('admin.create');
    }

    public function create(Request $request){

        
        $post = new Post();
        
        $ruta = "images/";
        // var_dump($request->file('image'));
        
        $post->title = $request->titulo;
        $post->intro = $request->intro;
        $post->body = $request->texto;

        if ($request->file("imagen")) {
            $fichero = $request->file("imagen");
            $ruta = public_path() . "\imagenes/";
            $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
            $movido = $fichero->move($ruta, $nombre_fichero);
            $post->img = $nombre_fichero;
        }
        
        $post->save(); 
        return redirect(route('admin.index'));
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect(route('admin.index'));
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('admin.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->title = $request->titulo;
        $post->intro = $request->intro;
        $post->body = $request->texto;

        
        if ($request->sinImg) {
            if(!$post::getImageAttribute($post->img)){
                // eliminar img
                $ruta = public_path() . "\imagenes/";
                $fichero = $post->img;
                $eliminado = unlink($ruta . $fichero);
            }
            $post->img = 'https://api.lorem.space/image/watch?w=940&h=170';

        } else {
            $ruta = public_path() . "\imagenes/";
            $fichero = $post->img;
            $eliminado = unlink($ruta . $fichero);

            $fichero = $request->file("imagen");
            $ruta = public_path() . "\imagenes/";
            $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
            $movido = $fichero->move($ruta, $nombre_fichero);
            $post->img = $nombre_fichero;
        }



        $post->save();

        return redirect('admin/posts/'.$post->id.'/edit')->with('message', 'Post actualizado correctamente');
    }
}
