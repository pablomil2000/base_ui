<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TweetController extends Controller
{
    public function newTweet(){

        request()->validate([
            'tweet' => 'required',
        ]);

        $tweet = new Tweet();
        $tweet->tweet = request('tweet');
        $tweet->user_id = auth()->user()->id;
        $tweet->save();

        return redirect(route('home')); 
    }

    public function loadTweets(){
        //solo usuarios segidos
        $segidos = auth()->user()->Sigue;
        $segidos = array_column($segidos->toArray(), 'follow_id');

        $tweets = Tweet::whereIn('user_id', $segidos)->orderBy('created_at', 'desc')->get();
        return view('inicio', compact('tweets'));
    }

    public function getTweets($id){
        $tweets = Tweet::where('user_id', $id)->orderBy('id', 'asc')->get();
        return view('perfil', compact('tweets'));
    }

    public function deleteTweet($id){
        $tweet = Tweet::find($id);
        if($tweet->user_id == auth()->user()->id){
            $tweet->delete();
        }
        return redirect(route('home'));
    }
}
