<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function User(){
        return $this->BelongsTo(User::class);
    }

    // Relacion N:M

    public function Userlikes(){
        return $this->belongsToMany(User::class);
    }

    public function likesAttribute(){
        $sql ='SELECT * from post_user WHERE post_id = ' . $this->id;
        // return $sql;
        $likes = \DB::select($sql);
        return $likes;
    }

    public function numComentAtribute(){
        $sql ='SELECT * from coments WHERE post_id = ' . $this->id;
        // return $sql;
        $numcoment = \DB::select($sql);
        // var_dump($numcoment);
        return $numcoment;
    }
}
