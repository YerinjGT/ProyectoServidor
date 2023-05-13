<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docenteid');
            $table->foreign('docenteid')->references('id')->on('docentes')->onDelete('cascade');
            $table->unsignedBigInteger('carreraid');
            $table->foreign('carreraid')->references('id')->on('carreras')->onDelete('cascade');
            $table->String('nombrepro')->unique()->nullable();
            $table->Boolean('estado');
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
        Schema::dropIfExists('proyecto');
    }
}
