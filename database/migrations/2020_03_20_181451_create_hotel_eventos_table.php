<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel');
            $table->integer('cantidad_habitaciones_sencillas');
            $table->integer('cantidad_habitaciones_dobles');
            $table->double('precio_habitacion_sencillas');
            $table->double('precio_habitacion_dobles');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('hotel_eventos');
    }
}
