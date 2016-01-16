<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasTransports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas_transporte',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_transporte')->index();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('horario_apertura');
            $table->string('horario_cierre');
            $table->string('horario_rutas');
            $table->integer('precio_standard');
            $table->integer('id_galeria');
            $table->integer('vehiculo');
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
        Schema::drop('rutas_transporte');
    }
}
