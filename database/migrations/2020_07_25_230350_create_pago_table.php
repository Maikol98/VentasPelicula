<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->Increments('Id');
            $table->string('TipoPago');
            $table->string('Monto');
            $table->string('Fecha');
            $table->string('NumeroTarjeta')->nullable();
            $table->integer('FechaExpiracion')->nullable();
            $table->integer('Codigo')->nullable();
            $table->integer('Id_Pedido')->unsigned();
            $table->foreign('Id_Pedido')->references('Id')->on('pedido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago');
    }
}
