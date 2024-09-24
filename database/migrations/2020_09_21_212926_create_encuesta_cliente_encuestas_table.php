<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaClienteEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_cliente_encuestas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->index('survey_id');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')
                ->references('id')
                ->on('encuesta_cliente');

            $table->index('encuestas_id');
            $table->unsignedBigInteger('encuestas_id');
            $table->foreign('encuestas_id')
                ->references('id')
                ->on('encuestas');

            $table->integer('value');
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
        Schema::dropIfExists('encuesta_cliente_encuestas');
    }
}
