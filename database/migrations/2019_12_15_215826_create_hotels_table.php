<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email')->nullable();
            $table->unsignedBigInteger('dias_antelacion_reserva_id');
            $table->foreign('dias_antelacion_reserva_id')
                ->references('id')
                ->on('dias_antelacion_reservas');
            $table->string('imagen');
            $table->double('precio_desde');
            $table->enum('oferta_especial',['Activo', 'Inactivo'])->nullable();;
            $table->enum('estado',['Activo', 'Inactivo']);
            $table->string('facilidades_ids');
            $table->string('created_by');
            $table->timestamps();
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')
                ->references('id')
                ->on('provincias');
            $table->string('plan_alojamiento_id');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
