<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->String('claveproyecto')->unique()->nullable();
            $table->String('programaedu');
            $table->String('lineainves');
            $table->unsignedBigInteger('idcarrera');
            $table->foreign('idcarrera')->references('id')->on('carreras')->onDelete('cascade');
            $table->String('nombredocente');
            $table->String('colab');
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
        Schema::dropIfExists('docentes');
    }
}
