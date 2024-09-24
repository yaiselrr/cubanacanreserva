<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservarTransferUnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservar_transfer_unicos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->boolean('en_espera');

            $table->unsignedBigInteger('provincia_origen_id');
            $table->foreign('provincia_origen_id')->references('id')->on('provincias')->onDelete('cascade');

            $table->unsignedBigInteger('provincia_destino_id');
            $table->foreign('provincia_destino_id')->references('id')->on('provincias')->onDelete('cascade');

            $table->string('nombre_apellidos')->nullable();

            $table->string('email')->unique();

            $table->integer('cantidad_personas')->nullable();

            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads')->onDelete('cascade');

            $table->string('requerimientos_especiales');

            $table->integer('no_vuelo')->nullable();

            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('status_reservas')->onDelete('cascade');

            $table->float('total')->default(0.0);
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
        Schema::dropIfExists('reservar_transfer_unicos');
    }
}
