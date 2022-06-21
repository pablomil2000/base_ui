<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function CartDetails()
    {
        return $this->hasMany(CartDetails::class);
    }

    public function getUrlImagesAttribute()
    {
        $url = substr($this->image, 0, 4);

        if ($url != 'http') {
            return false;
        }

        return true;
    }
}
