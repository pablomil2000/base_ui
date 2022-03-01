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
        $this->call(CategoriesSeeder::class);



        //borra esto
        User::create([
            'name'=>'pablo',
            'email'=>'pablo@gmail.com',
            'password'=>bcrypt('pablo123'),
            'web'=>'http://pablo.com'
        ]);
    }
}
