<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTypeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_type_details', function (Blueprint $table) {
            $table->primary(['pokemon_types_id', 'pokemon_id']);

            $table->foreignId('pokemon_types_id')
                  ->constrained('pokemon_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreignId('pokemon_id')
                  ->constrained('pokemon')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('pokemon_type_details');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
