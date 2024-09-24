<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservarHabitacionExcursionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservar_habitacion_excursiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_habitacion');
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_ninnos2a12');
            $table->integer('cantidad_ninnos0a2');
            $table->double('precio_total');

            $table->unsignedBigInteger('reserva_excursion_id')->nullable();
            $table->foreign('reserva_excursion_id')->references('id')
                ->on('reserva_excursiones')->onDelete('cascade');
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
        Schema::dropIfExists('reservar_habitacion_excursiones');
    }
}
