<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->Increments('Id');
            $table->string('Descripcion');
            $table->integer('Id_Pelicula')->unsigned();
            $table->integer('Id_Cliente')->unsigned();
            $table->foreign('Id_Pelicula')->references('Id')->on('pelicula')->onDelete('cascade');
            $table->foreign('Id_Cliente')->references('CI')->on('cliente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario');
    }
}
