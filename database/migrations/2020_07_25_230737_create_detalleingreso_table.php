<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleingresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleingreso', function (Blueprint $table) {
            $table->integer('Id_Ingreso')->unsigned();
            $table->integer('Id_Pelicula')->unsigned();
            $table->integer('Cantidad');
            $table->float('Sutotal');
            $table->primary(['Id_Ingreso','Id_Pelicula']);
            $table->foreign('Id_Ingreso')->references('Id')->on('ingreso')
            ->onDelete('cascade');
            $table->foreign('Id_Pelicula')->references('Id')->on('pelicula')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleingreso');
    }
}
