<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pablo',
            'email' => 'pablo@gmail.com',
            'password' => Hash::make('pablo123'),
        ]);
    }
}
