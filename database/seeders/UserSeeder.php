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
            'name' => 'pablo',
            'username' => 'pablo',
            'email' => 'pablo@gmail.com',
            'password' => bcrypt('pablo123'),
            'balance' => 100,
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'balance' => 0,
            'profesor' => true,
        ]);

        User::factory(4)->create();

    }
}
