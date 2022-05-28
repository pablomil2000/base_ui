<?php

namespace Database\Seeders;

use App\Models\Animator;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class AnimatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Animator::factory()->count(40)->create();
    }
}
