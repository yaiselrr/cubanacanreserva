<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservarConectandoCubasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservar_conectando_cubas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('fecha')->nullable();

            $table->unsignedBigInteger('provincia_origen_id');
            $table->foreign('provincia_origen_id')->references('id')->on('provincias')->onDelete('cascade');

            $table->unsignedBigInteger('provincia_destino_id');
            $table->foreign('provincia_destino_id')->references('id')->on('provincias')->onDelete('cascade');

            $table->string('nombre_apellidos')->nullable();

            $table->string('email');

            $table->integer('cantidad_adultos')->unique();

            $table->integer('cantidad_infantes');

            $table->integer('cantidad_ninnos');

            $table->unsignedBigInteger('lugar_recogida_id');
            $table->foreign('lugar_recogida_id')->references('id')->on('lugar_recogida_conectando_cubas')->onDelete('cascade');

            $table->time('hora_recogida');

            $table->string('requerimientos_especiales');

            $table->float('total')->default(0.0);

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
        Schema::dropIfExists('reservar_conectando_cubas');
    }
}
