<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // metodo para diferenciar imagenes en disco de url
    public function getImageAttribute($img)
    {
        if (substr($img, 0, 4) === "http") {
            return true;
        }
        return false;
    }
}
