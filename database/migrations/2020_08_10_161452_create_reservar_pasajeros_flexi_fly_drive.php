<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservarPasajerosFlexiFlyDrive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservar_pasajeros_flexi_drive', function (Blueprint $table) {
            $table->bigInteger('pasajero_id')->unsigned()->index();
            $table->foreign('pasajero_id')->references('id')->on('datos_clientes')->onDelete('cascade');
            $table->bigInteger('reserva_id')->unsigned()->index();
            $table->foreign('reserva_id')->references('id')->on('reservar_flexi_drives')->onDelete('cascade');
            $table->primary(['pasajero_id', 'reserva_id']);
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
        Schema::dropIfExists('reservar_pasajeros_flexi_fly_drive');
    }
}
