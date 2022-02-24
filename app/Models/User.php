<?php

namespace App\Models;

use App\Models\Post;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'nick',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Post(){
        return $this->hasMany(Post::class);
    }


    // Relacion N:M

    public function Postlikes(){
        return $this->belongsToMany(Post::class);
    }



    // Campo calculado Nº post
    public function nPost(){

        $sql ='SELECT * from posts WHERE user_id = ' . $this->id;
        // return $sql;
        $post = \DB::select($sql);
        $total = count($post);
        return $total.' imagen/es';
    }

    public function nLikes(){
        $sql ='SELECT * from post_user WHERE user_id = ' . $this->id;
        // return $sql;
        $post = \DB::select($sql);
        $total = count($post);
        return $total.' me gusta';
    }

    public function nComents(){
        $sql ='SELECT * from coments WHERE user_id = ' . $this->id;
        // return $sql;
        $post = \DB::select($sql);
        $total = count($post);
        return $total.' comentario';
    }

    public function myPost(){
        $sql ='SELECT * from posts WHERE user_id = ' .$this->id;
        $posts = \DB::select($sql);
        return $posts;
    }
}
