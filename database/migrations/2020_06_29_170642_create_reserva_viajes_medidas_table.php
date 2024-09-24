<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaViajesMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_viajes_medidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->double('precio_total');
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_ninnos2a12');
            $table->integer('cantidad_ninnos0a2');
            $table->string('req_especiales');

            $table->unsignedBigInteger('viaje_medida_id');
            $table->foreign('viaje_medida_id')->references('id')->on('viajes_medidas')->onDelete('cascade');

            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('status_reservas')->onDelete('cascade');

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
        Schema::dropIfExists('reserva_viajes_medidas');
    }
}
