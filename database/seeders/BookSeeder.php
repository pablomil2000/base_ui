<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Editorial;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->count(10000)->create();
    }
}
