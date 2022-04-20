<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    public function Follow($id){
        $follow = new Follow();
        $follow->follow_id = auth()->user()->id;
        $follow->user_id = $id;
        $follow->save();
        return back();
    }

    public function unfollow($id){

        //eliminar segidor
        $follow = Follow::find($id);
        $follow->delete();

        return back();
    }
}
