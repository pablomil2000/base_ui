<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    public function numPost(){
        $posts = Post::all();
        return $posts->count();
    }

    public function totalVisitas(){
        $visitas = Post::all();
        $total = 0;
        foreach ($visitas as $visita) {
            $total += $visita->visitas;
        }
        return $total;
    }

    Public function User(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
