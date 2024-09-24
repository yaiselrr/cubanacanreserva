<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaHabitacionCircuitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_habitacion_circuitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo_habitacion',['Secilla','Doble','Triple']);
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_ninnos2a12');
            $table->integer('cantidad_ninnos0a2');
            $table->double('precio');
            $table->mediumText('req_especiales');

            $table->unsignedBigInteger('circuito_id');
            $table->foreign('circuito_id')->references('id')->on('circuitos')->onDelete('cascade');

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
        Schema::dropIfExists('reserva_habitacion_circuitos');
    }
}
