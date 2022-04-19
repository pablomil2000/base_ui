<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    public function Follow($id){
        $follow = new Follow();
        $follow->follow_id = $id;
        $follow->user_id = auth()->user()->id;
        $follow->save();
        return back();
    }

    public function unfollow($id){
        $follow = Follow::where('user_id', '=', $id)->first();
        $follow->delete();

        return back();
    }
}
