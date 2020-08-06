<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('CI')->unsigned();
            $table->primary('CI');
            $table->string('Nombre');
            $table->string('Apellido');
            $table->integer('Telefono');
            $table->date('FechaNacimiento');
            $table->string('Direccion');
            $table->string('Email');
            $table->integer('Estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
