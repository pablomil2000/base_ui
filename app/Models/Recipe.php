<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function UsersApuntados(){
        return $this->belongsToMany(User::class);
    }

    public function getInscritosAttribute()
    {
        $curso = $this;
        return $curso->UsersApuntados;
    }

    public function getUrlImageAttribute(){

        $str = $this->image;

        $str = substr($str, 0, 4);
        if ($str == 'http') {
            return $this->image;
        }

        return 'img/recipes/'.$str;

    }
}
