<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
        return view('inicio', compact('posts'));
    }

    public function getPost($id){
        $post = Post::find($id);
        return view('post', compact('post'));
    }
}
