<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'pabloAdmin',
            'telefono' => '123456789',
            'salario' => 1000,
            'username' => 'pablo123',
            'email' => 'pablo@gmail.com',
            'password' => bcrypt('pablo'),
            'admin' => true
        ]);
        // User::factory(9)->create();
    }
}
