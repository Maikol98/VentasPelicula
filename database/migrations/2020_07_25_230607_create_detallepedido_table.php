<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepedido', function (Blueprint $table) {
            $table->integer('Id_Pedido')->unsigned();
            $table->integer('Id_Pelicula')->unsigned();
            $table->integer('Cantidad');
            $table->float('Subtotal');
            $table->primary(['Id_Pedido','Id_Pelicula']);
            $table->foreign('Id_Pedido')->references('Id')->on('pedido')
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
        Schema::dropIfExists('detallepedido');
    }
}
