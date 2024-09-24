<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaExcursionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_excursiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_entrada');
            $table->unsignedBigInteger('idioma_id');
            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('cascade');
            $table->string('telefono');
            $table->string('nombre');
            $table->string('hora_salida_hotel_recogida')->nullable();
            $table->string('hora_salida_auto')->nullable();
            $table->string('lugar_salida')->nullable();
            $table->string('tipo_cicloturismo')->nullable();
            $table->string('tipo_excursion_delfines')->nullable();
            $table->string('email')->unique();
            $table->double('precio_total');
            $table->boolean('habitacion_excursion')->nullable();
            $table->string('almuerzo')->nullable();

            $table->integer('cantidad_adultos')->nullable();
            $table->integer('cantidad_ninnos2a12')->nullable();
            $table->integer('cantidad_ninnos0a2')->nullable();

            $table->unsignedBigInteger('hotel_recogida_id')->nullable();
            $table->foreign('hotel_recogida_id')->references('id')
                ->on('hotel_recogidas')->onDelete('cascade');


            $table->unsignedBigInteger('excursion_id');
            $table->foreign('excursion_id')->references('id')->on('excursiones')->onDelete('cascade');

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
        Schema::dropIfExists('reserva_excursiones');
    }
}
