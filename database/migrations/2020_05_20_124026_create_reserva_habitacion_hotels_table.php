<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaHabitacionHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_habitacion_hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_entrada');
            $table->string('tipo_habitacion');
            $table->integer('cantidad_noche');
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_ninnos2a12');
            $table->integer('cantidad_ninnos0a2');
            $table->integer('cantidad')->nullable();
            $table->double('precio_total');
            $table->mediumText('req_especiales');

            $table->unsignedBigInteger('hotels_id');
            $table->foreign('hotels_id')->references('id')->on('hotels')->onDelete('cascade');

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
        Schema::dropIfExists('reserva_habitacion_hotels');
    }
}
