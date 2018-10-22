<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTituloLatinoMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie', function (Blueprint $table) {
            $table->string("nombre_latino");
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
        Schema::table('movie', function (Blueprint $table) {
            $table->string("nombre_latino");
            $table->string("idioma");
        });
    }
}
