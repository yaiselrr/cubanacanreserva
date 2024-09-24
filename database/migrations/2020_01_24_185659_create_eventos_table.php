<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('dias_antelacions_id');
            $table->foreign('dias_antelacions_id')->references('id')->on('dias_antelacion_reservas')->onDelete('cascade');
            $table->unsignedBigInteger('lugars_id');
            $table->foreign('lugars_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('cuota')->nullable();
            $table->string('convocatoria')->nullable();
            $table->string('programa')->nullable();
            $table->string('created_by')->nullable();
            $table->enum('servicio_transporte',['Activo', 'Inactivo'])->nullable();
            
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
            $table->boolean('oferta_especial');
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
        Schema::dropIfExists('eventos');
    }
}
