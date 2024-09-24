<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBurosTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buros_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('nombre',200)->nullable();
            $table->text('direccion',500)->nullable();
            $table->string('idioma',2)->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('buro_id');

            $table->foreign('buro_id')->references('id')->on('buros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buros_traslations');
    }
}
