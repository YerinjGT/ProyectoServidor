<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->longText('descripcion');
            $table->longText('objetivos');
            $table->string('clave')->unique();
            $table->string('programa');
            $table->string('linea');
            $table->date('fechaInicio');
            $table->date('fechaFin')->nullable();
            $table->boolean('estado');
            $table->unsignedBigInteger('responsable');
            $table->foreign('responsable')->references('id')->on('colaboradores')->onDelete('cascade');
            $table->unsignedBigInteger('carreraid');
            $table->foreign('carreraid')->references('id')->on('carreras')->onDelete('cascade');
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
        Schema::dropIfExists('proyectos');
    }
}
