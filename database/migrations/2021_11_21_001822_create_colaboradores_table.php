<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('email');
            $table->string('telefono');
            $table->integer('colab_type'); //switches between teacher, engineer or student
            $table->string('nControl')->nullable();; //if student case
            $table->unsignedBigInteger('idCarrera'); //if all cases
            $table->foreign('idCarrera')->references('id')->on('carreras')->onDelete('cascade');
            $table->string('department')->nullable();; //if teacher or enginner case
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
        Schema::dropIfExists('colaboradores');
    }
}
