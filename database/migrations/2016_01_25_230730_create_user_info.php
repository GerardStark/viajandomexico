<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_usuarios', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_usuario')->index();
            $table->string('descripcion');
            $table->string('imagen_usuario');
            $table->integer('telefono');
            $table->string('direccion');
            $table->integer('activo');
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
        Schema::drop('info_usuarios');
    }
}
