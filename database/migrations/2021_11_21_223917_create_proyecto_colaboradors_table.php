<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_colaboradors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProyecto');
            $table->foreign('idProyecto')->references('id')->on('proyectos')->onDelete('cascade');
            $table->unsignedBigInteger('idColaborador');
            $table->foreign('idColaborador')->references('id')->on('colaboradores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_colaboradors');
    }
}
