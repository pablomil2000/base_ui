<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'email',
        'password',
        'telefono',
        'Salario',
        'Usuario',
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


    public function table(){
        return $this->hasMany(User::class);
    }

    public function getTotalCuentasAttribute(){
        $mesas = table::where("user_id", auth()->user()->id)->get();
        $total = 0;
        foreach ($mesas as $mesa){
            $total += $mesa->cuenta;
        }
        return $total;
    }

    public function getTotalPropinasAttribute(){
        $mesas = table::where("user_id", auth()->user()->id)->get();
        $total = 0;
        foreach ($mesas as $mesa){
            $total += ($mesa->cuenta)*0.1;
        }
        return $total;
    }

    public function getTotalCobrarAttribute(){
        $mesas = table::where("user_id", auth()->user()->id)->get();
        $total = 0;
        $a=0;
        $b=0;
        foreach ($mesas as $mesa){
            $a += $mesa->cuenta;
            $b += ($mesa->cuenta)*0.10;

            $total+=$a+$b;
        }
        return $total;
    }
}
