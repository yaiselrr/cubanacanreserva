<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcursionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excursiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('imagen');
            $table->unsignedBigInteger('modalidads_id');
            $table->foreign('modalidads_id')
                ->references('id')
                ->on('modalidads');
            $table->unsignedBigInteger('dias_antelacion_reserva_id');
            $table->foreign('dias_antelacion_reserva_id')
                ->references('id')
                ->on('dias_antelacion_reservas');
            $table->unsignedBigInteger('duracion_id');
            $table->foreign('duracion_id')
                ->references('id')
                ->on('duracions');
            $table->unsignedBigInteger('territorio_origen_id');
            $table->foreign('territorio_origen_id')
                ->references('id')
                ->on('provincias');
            $table->unsignedBigInteger('territorio_destino_id');
            $table->foreign('territorio_destino_id')
                ->references('id')
                ->on('provincias')
                ->onDelete('cascade');
            $table->string('idioma_id');
            $table->double('paxminimo');
            $table->enum('oferta_especial',['Activo', 'Inactivo'])->nullable();
            $table->enum('estado',['Activo', 'Inactivo']);
            $table->string('dias_semana_ids');
            $table->integer('capacidad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('frecuencia_id');
            $table->foreign('frecuencia_id')
                ->references('id')
                ->on('frecuencias');

            $table->boolean('excursion_unica')->nullable();
            $table->double('precio_pax_unica')->nullable();
            $table->double('precio_ninnos2a12annos_unica')->nullable();

            $table->boolean('excursion_auto_clasico')->nullable();
            $table->double('precio_pax_auto')->nullable();
            $table->string('hora_salida_auto')->nullable();

            $table->boolean('excursion_alimentacion')->nullable();
            $table->double('precio_pax_almuerzo')->nullable();
            $table->double('precio_ninnos2a12anno_almuerzo')->nullable();
            $table->double('precio_pax_sin_almuerzo')->nullable();
            $table->double('precio_ninnos2a12anno_sin_almuerzo')->nullable();
            $table->double('precio_pax_TI')->nullable();
            $table->double('precio_ninnos2a12anno_TI')->nullable();

            $table->boolean('excursion_habitacion')->nullable();
            $table->double('precio_pax_hab_sencilla')->nullable();
            $table->double('precio_ninnos2a12anno_hab_sencilla')->nullable();
            $table->double('precio_pax_hab_dobles')->nullable();
            $table->double('precio_ninnos2a12anno_hab_dobles')->nullable();

            $table->boolean('excursion_pinar_vinnales')->nullable();
            $table->double('precio_pax_Pinar')->nullable();
            $table->double('precio_ninnos2a12anno_Pinar')->nullable();
            $table->double('precio_pax_Vinnales')->nullable();
            $table->double('precio_ninnos2a12anno_Vinnales')->nullable();

            $table->boolean('excursion_cicloturismo')->nullable();
            $table->double('precio_pax_con_canopy')->nullable();
            $table->double('precio_pax_sin_canopy')->nullable();

            $table->boolean('excursion_delfines')->nullable();
            $table->double('precio_pax_banno_delfines')->nullable();
            $table->double('precio_ninnos2a12anno_banno_delfines')->nullable();
            $table->double('precio_pax_show_delfines')->nullable();
            $table->double('precio_ninnos2a12anno_show_delfines')->nullable();


            $table->string('created_by');
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
        Schema::dropIfExists('excursiones');
    }
}
