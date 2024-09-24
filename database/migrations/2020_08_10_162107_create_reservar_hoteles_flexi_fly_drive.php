<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservarHotelesFlexiFlyDrive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservar_hoteles_flexi_fly_drive', function (Blueprint $table) {
            $table->bigInteger('hotel_id')->unsigned()->index();
            $table->foreign('hotel_id')->references('id')->on('hotel_flexy_drives')->onDelete('cascade');
            $table->bigInteger('reserva_id')->unsigned()->index();
            $table->foreign('reserva_id')->references('id')->on('reservar_flexi_drives')->onDelete('cascade');
            $table->integer('cantidad_habitaciones_dobles');
            $table->primary(['hotel_id', 'reserva_id']);
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
        Schema::dropIfExists('reservar_hoteles_flexi_fly_drive');
    }
}
