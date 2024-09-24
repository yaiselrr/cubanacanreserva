<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('total_precio');
            $table->string('nombre_producto');
            $table->string('tipo_producto');
            $table->string('estado');

            $table->unsignedBigInteger('reserva_hab_hotel_id')->nullable();
            $table->foreign('reserva_hab_hotel_id')->references('id')
                ->on('reserva_habitacion_hotels')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_hab_circuito_id')->nullable();
            $table->foreign('reserva_hab_circuito_id')->references('id')
                ->on('reserva_habitacion_circuitos')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_viajes_medida_id')->nullable();
            $table->foreign('reserva_viajes_medida_id')->references('id')
                ->on('reserva_viajes_medidas')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_excursion_id')->nullable();
            $table->foreign('reserva_excursion_id')->references('id')
                ->on('reserva_excursiones')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_conectando_id')->nullable();
            $table->foreign('reserva_conectando_id')->references('id')
                ->on('reservar_transfer_conectando_cubas')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_colectivo_id')->nullable();
            $table->foreign('reserva_colectivo_id')->references('id')
                ->on('reservar_transfer_colectivos')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_privado_id')->nullable();
            $table->foreign('reserva_privado_id')->references('id')
                ->on('reservar_transfer_privados')->onDelete('cascade');

            $table->unsignedBigInteger('reserva_unico_id')->nullable();
            $table->foreign('reserva_unico_id')->references('id')
                ->on('reservar_transfer_unicos')->onDelete('cascade');

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
        Schema::dropIfExists('carrito_compras');
    }
}
