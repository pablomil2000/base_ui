<?php

namespace App\Models;

use App\Models\Car;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarDetail extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function Products()
    {
        return $this->belongsTo(Product::class);
    }
}
