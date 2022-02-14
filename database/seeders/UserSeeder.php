<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'usuario0',
            'email'=>'usuario0@arboleda.com',
            'password'=>bcrypt('arboleda'),
            'pregunta'=>'pregunta0',
            'respuesta'=>'respuesta0'
        ]);
        User::create([
            'name'=>'usuario1',
            'email'=>'usuario1@arboleda.com',
            'password'=>bcrypt('arboleda'),
            'pregunta'=>'pregunta1',
            'respuesta'=>'respuesta1'
        ]);
        User::create([
            'name'=>'usuario2',
            'email'=>'usuario2@arboleda.com',
            'password'=>bcrypt('arboleda'),
            'pregunta'=>'pregunta2',
            'respuesta'=>'respuesta2'
        ]);
    }
}
