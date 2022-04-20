<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function like($id){
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->tweet_id = $id;
        $like->save();
        return back();
    }

    public function disLike($id){
        $like = Like::where('user_id', auth()->user()->id)->where('tweet_id', $id)->first();
        $like->delete();
        return back();
    }
}
