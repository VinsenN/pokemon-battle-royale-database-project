<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_details', function (Blueprint $table) {
            $table->primary(['matchs_id', 'players_id']);

            $table->foreignId('matchs_id')
                  ->constrained('matchs')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreignId('players_id')
                  ->constrained('players')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreignId('pokemon_id')
                  ->constrained('pokemon')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('match_score');

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
        Schema::dropIfExists('match_details');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
