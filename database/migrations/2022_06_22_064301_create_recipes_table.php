<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description_C');
            $table->string('description_L');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('image')->default('default.png');
            $table->integer('capacidad');
            $table->integer('precio');
            $table->integer('estado');

            // estado 0 = Proximamente
            // estado 1 = disponible
            // estado 2 = Cancelado
            // estado 3 = Finalizado 

            $table->foreignId('user_id')->constrained(); //autor del curso

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
