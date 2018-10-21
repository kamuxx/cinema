<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMovieCalidadSizeMovieCalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie_calidad', function (Blueprint $table) {
            $table->string('resolucion');
            $table->string('size');
            $table->string('formato');
            $table->string("idioma");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movie_calidad', function (Blueprint $table) {
            $table->string('resolucion');
            $table->string('size');
            $table->string('formato');
            $table->string("idioma");
        });
    }
}
