<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pregunta')->nullable();
            $table->string('locale')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('encuesta_id');
            $table->unique(['encuesta_id','locale'/*,'question'*/]);
            $table->foreign('encuesta_id')->references('id')->on('encuestas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_traslations');
    }
}
