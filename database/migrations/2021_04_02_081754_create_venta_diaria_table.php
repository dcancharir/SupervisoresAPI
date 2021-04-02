<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaDiariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_diaria', function (Blueprint $table) {
            $table->bigIncrements('venta_id');
            $table->date('fecha');
            $table->bigInteger('tienda_id')->unsigned()->nullable();
            $table->decimal('monto',$precision = 8, $scale = 2)->unsigned();
            $table->string('moneda');
            $table->foreign('tienda_id')->references('tienda_id')->on('tienda');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_diaria');
    }
}
