<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->Increments('Id');
            $table->date('FechaPedido');
            $table->float('PrecioTotal');
            $table->string('Estado');
            $table->string('Direccion');
            $table->string('Descripcion')->nullable();
            $table->integer('Ci_Cliente')->unsigned();
            $table->foreign('Ci_Cliente')->references('CI')->on('cliente')
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
        Schema::dropIfExists('pedido');
    }
}
