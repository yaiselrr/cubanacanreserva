<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('descripcion')->nullable();
            $table->string('locale')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('servicio_id');
            $table->unique(['servicio_id','locale']);
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_traslations');
    }
}
