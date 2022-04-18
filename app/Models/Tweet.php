<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;


    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function Comment(){
        return $this->hasMany('App\Models\Comment');
    }
}
