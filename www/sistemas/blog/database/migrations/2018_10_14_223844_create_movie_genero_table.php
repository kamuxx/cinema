<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_genero', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            //rest of fields then...
            $table->foreign('movie_id')->references('id')->on('movie');
            $table->integer('genero_id')->unsigned();
            //rest of fields then...
            $table->foreign('genero_id')->references('id')->on('genero');
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
        Schema::drop('movie_genero');
    }
}
