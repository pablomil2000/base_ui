<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::create([
            'name'=>'pablo',
            'surname'=>'martin',
            'nick' =>'@pablo123',
            'email'=>'pablo@gmail.com',
            'password'=>bcrypt('pablo123'),
        ]);

    }
}
