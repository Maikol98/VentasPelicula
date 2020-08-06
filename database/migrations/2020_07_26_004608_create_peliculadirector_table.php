<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculadirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculadirector', function (Blueprint $table) {
            $table->integer('Id_Pelicula')->unsigned();
            $table->integer('Id_Director')->unsigned();
            $table->primary(['Id_Pelicula','Id_Director']);
            $table->foreign('Id_Pelicula')->references('Id')->on('pelicula')
            ->onDelete('cascade');
            $table->foreign('Id_Director')->references('Id')->on('director')
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
        Schema::dropIfExists('peliculadirector');
    }
}
