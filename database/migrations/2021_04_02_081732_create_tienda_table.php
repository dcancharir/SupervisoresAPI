<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienda', function (Blueprint $table) {
            $table->increments('tienda_id');
            $table->string('cc');
            $table->string('nombre');
            $table->string('direccion');
            $table->integer('razon_social_id');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('correo_jop')->nullable();
            $table->string('correo_sop')->nullable();
            $table->string('ubigeo')->nullable();
            $table->integer('supervisor_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tienda');
    }
}
