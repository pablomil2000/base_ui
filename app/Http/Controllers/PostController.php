<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //Usuarios\\
    
    public function getPost($id){
        // https://laravel.com/docs/9.x/eloquent#not-found-exceptions   //teoria de esto

        // $post = Post::findOrFail($id)->where('fechaPublicacion', '<=', date('Y-m-d'))->get();
        // $post = Post::findOrFail($id);
        $post = Post::where('fechaPublicacion', '<=', date('Y-m-d'))->findOrFail($id);
        $post->visitas = $post->visitas + 1;
        $post->save();
        return view('post', compact('post'));
    }

}
