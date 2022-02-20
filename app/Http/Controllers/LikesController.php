<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Likes;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like($id){
        $user = auth()->user();
        $likes = Likes::where([['user_id', '=', $id],['post_id', 'id', $user->id]])->get();

        if (!empty($likes)) {
            $like = new Likes();
            $like->user_id = $user->id;
            $like->post_id = $id;
            $like->save();
        }
        return back();
    }

    public function dlike($id){
        $user = auth()->user();
        $likes = Likes::where('user_id', '=', $user->id)->where('post_id', '=', $id)->get();
        foreach($likes as $like){
            $like->delete();
        }
        return back();
    }
}
