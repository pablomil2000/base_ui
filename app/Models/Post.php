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
}
