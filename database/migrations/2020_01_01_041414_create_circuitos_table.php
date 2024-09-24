-<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircuitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('es');
            $table->boolean('en');
            $table->boolean('dt');
            $table->boolean('fr');
            $table->boolean('pt');
            $table->boolean('it');
            $table->boolean('oferta_especial');
            $table->string('imagen')->nullable();
            $table->string('detalles')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('frecuencias_id');
            $table->foreign('frecuencias_id')->references('id')->on('frecuencias')->onDelete('cascade');
            $table->unsignedBigInteger('modalidads_id');
            $table->foreign('modalidads_id')->references('id')->on('modalidads')->onDelete('cascade');
            $table->unsignedBigInteger('dias_semanas_id');
            $table->foreign('dias_semanas_id')->references('id')->on('dias_semanas')->onDelete('cascade');
            $table->string('mapa')->nullable();
            $table->float('precio_desde')->default(0.0);
            $table->integer('pax_min')->default(0);
            $table->unsignedBigInteger('provincias_id');
            $table->foreign('provincias_id')->references('id')->on('provincias')->onDelete('cascade');
            $table->unsignedBigInteger('duracions_id');
            $table->foreign('duracions_id')->references('id')->on('duracions')->onDelete('cascade');
            $table->unsignedBigInteger('dias_antelacions_id');
            $table->foreign('dias_antelacions_id')->references('id')->on('dias_antelacion_reservas')->onDelete('cascade');
            $table->integer('esta_activo');
            $table->string('created_by')->nullable();
            //$table->float('km');
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
        Schema::dropIfExists('circuitos');
    }
}
