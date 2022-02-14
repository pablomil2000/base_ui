<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Galery::factory()->count(2)->has(Image::factory()->count(3))->create();
    }
}
