<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieCalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_calidad', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('movie_id')->unsigned();
            //rest of fields then...
            $table->foreign('movie_id')->references('id')->on('movie');
            $table->integer('calidad_id')->unsigned();
            //rest of fields then...
            $table->foreign('calidad_id')->references('id')->on('calidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movie_calidad');
    }
}
