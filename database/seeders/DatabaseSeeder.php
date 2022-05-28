<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(SpecialtySeeder::class);
        $this->call(AnimatorSeeder::class);
        $this->call(UserSeeder::class);
        
        User::create([
            'name'=>'pablo',
            'email'=>'pablo@gmail.com',
            'password'=>bcrypt('pablo123'),
        ]);
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin'),
            'admin'=>true
        ]);
        $this->call(PartySeeder::class);
        $this->call(GoSeeder::class);
    }
}
