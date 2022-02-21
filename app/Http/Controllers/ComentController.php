<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Coment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComentController extends Controller
{
    public function public(Request $request, $id){
        $autor = auth()->user();

        $coment = new Coment();
        $coment->description = $request->description;
        $coment->user_id = $autor->id;
        $coment->post_id = $id;
        $coment->save();

        return back();
    }

    public function delete(Request $request, $id){
        $post = Post::find($id);
        $usuario = auth()->user()->id;
        $coment= Coment::find($request->coment);


        if ($post->user_id == $usuario || $coment->user_id == $usuario) {
            $coment->delete();
        }

        return back();
    }
}
