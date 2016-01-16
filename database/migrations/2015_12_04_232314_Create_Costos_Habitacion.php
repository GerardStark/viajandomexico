<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostosHabitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('costos_habitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_habitacion');
            $table->string('disponibilidad');
            $table->string('bind');
            $table->string('informacion');
            $table->string('notas');
            $table->integer('precio');
            $table->integer('promo');
            $table->string('estado');
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
        Schema::drop('costos_habitacion');
    }
}
