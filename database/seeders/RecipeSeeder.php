<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create([
            'name' => 'Italia para principiantes',
            'description_C'=>'Aprende las bases de la comida italiana con este curso',
            'description_L'=>'Nulla facilisi. Vestibulum commodo mattis orci, a dignissim nunc. In feugiat volutpat mattis. Quisque egestas.',
            'fecha_inicio'=>'6-15-2022',
            'fecha_fin' => '7-15-2022',
            // 'image'
            'capacidad' => '10',
            'precio' => '30',
            'user_id' => '2',
            'estado' => '3',
        ]);

        Recipe::create([
            'name' => 'Italia para principiantes',
            'description_C'=>'Aprende las bases de la comida italiana con este curso',
            'description_L'=>'Nulla facilisi. Vestibulum commodo mattis orci, a dignissim nunc. In feugiat volutpat mattis. Quisque egestas.',
            'fecha_inicio'=>'6-15-2022',
            'fecha_fin' => '7-15-2022',
            // 'image'
            'capacidad' => '10',
            'precio' => '30',
            'user_id' => '2',
            'estado' => '3',
        ]);

        Recipe::factory(7)->create();
    }
}
