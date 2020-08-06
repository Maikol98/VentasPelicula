<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelicula', function (Blueprint $table) {
            $table->Increments('Id');
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->float('Precio');
            $table->integer('Stock');
            $table->string('Poster');
            $table->string('Trailer');
            $table->string('Distribucion');
            $table->string('Categoria');
            $table->float('Valoracion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelicula');
    }
}
