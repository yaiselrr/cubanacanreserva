<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosPorViajesMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_por_viajes_medidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->double('precio_x_pax');
            $table->double('precio_ninnos_12annos');
            $table->integer('capacidad');
            $table->string('created_by')->nullable();

            $table->unsignedBigInteger('viaje_medida_id');
            $table->foreign('viaje_medida_id')->references('id')->on('viajes_medidas')->onDelete('cascade');
            $table->unsignedBigInteger('dias_antelacion_rese_id');
            $table->foreign('dias_antelacion_rese_id')->references('id')->on('dias_antelacion_reservas')->onDelete('cascade');
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
        Schema::dropIfExists('precios_por_viajes_medidas');
    }
}
