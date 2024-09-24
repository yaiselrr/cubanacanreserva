<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColectivosPrivadosConsCubasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colectivos_privados_cons_cubas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('ruta_id');
            $table->foreign('ruta_id')->references('id')->on('ruta_conectando_cubas')->onDelete('cascade');

            $table->unsignedBigInteger('dias_antelacion_id');
            $table->foreign('dias_antelacion_id')->references('id')->on('dias_antelacion_reservas')->onDelete('cascade');

            $table->unsignedBigInteger('provincia_origen_id');
            $table->foreign('provincia_origen_id')->references('id')->on('provincias')->onDelete('cascade');

            $table->unsignedBigInteger('provincia_destino_id');
            $table->foreign('provincia_destino_id')->references('id')->on('provincias')->onDelete('cascade');

            $table->float('precio_pax')->default(0.0);
            $table->float('precio_ninnos')->default(0.0);
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
        Schema::dropIfExists('colectivos_privados_cons_cubas');
    }
}
