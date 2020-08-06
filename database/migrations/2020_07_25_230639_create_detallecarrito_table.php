<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecarrito', function (Blueprint $table) {
            $table->integer('Id_Carrito')->unsigned();
            $table->integer('Id_Pelicula')->unsigned();
            $table->integer('Cantidad');
            $table->float('Subtotal');
            $table->primary(['Id_Carrito','Id_Pelicula']);
            $table->foreign('Id_Carrito')->references('Id')->on('carrito')
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
        Schema::dropIfExists('detallecarrito');
    }
}
