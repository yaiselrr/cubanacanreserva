<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads')->onDelete('cascade');
            $table->string('numero_pasaporte');
            $table->string('nombre');

            $table->unsignedBigInteger('reserva_hab_hotel_id')->nullable();
            $table->foreign('reserva_hab_hotel_id')->references('id')
                ->on('reserva_habitacion_hotels')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_hab_circuito_id')->nullable();
            $table->foreign('reserva_hab_circuito_id')->references('id')
                ->on('reserva_habitacion_circuitos')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_hab_excursion_id')->nullable();
            $table->foreign('reserva_hab_excursion_id')->references('id')
                ->on('reservar_habitacion_excursiones')->onDelete('cascade');
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
        Schema::dropIfExists('datos_clientes');
    }
}
