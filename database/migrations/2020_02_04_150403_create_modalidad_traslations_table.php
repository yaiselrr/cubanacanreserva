<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalidadTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidad_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',200)->nullable();
            $table->string('idioma')->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('modalidads_id');
            $table->foreign('modalidads_id')->references('id')->on('modalidads')->onDelete('cascade');
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
        Schema::dropIfExists('modalidad_traslations');
    }
}
