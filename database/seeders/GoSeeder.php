<?php

namespace Database\Seeders;

use App\Models\Go;
use Illuminate\Database\Seeder;

class GoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Go::factory(100)->create();
    }
}
