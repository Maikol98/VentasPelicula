<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculaactorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculaactor', function (Blueprint $table) {
            $table->integer('Id_Pelicula')->unsigned();
            $table->integer('Id_Actor')->unsigned();
            $table->primary(['Id_Pelicula','Id_Actor']);
            $table->foreign('Id_Pelicula')->references('Id')->on('pelicula')
            ->onDelete('cascade');
            $table->foreign('Id_Actor')->references('Id')->on('actor')
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
        Schema::dropIfExists('peliculaactor');
    }
}
