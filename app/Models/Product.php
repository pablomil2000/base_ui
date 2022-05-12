<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Car;

class Product extends Model
{
    use HasFactory;

    Public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carDetails(){
        return $this->hasMany(CarDetail::class);
    }
}
