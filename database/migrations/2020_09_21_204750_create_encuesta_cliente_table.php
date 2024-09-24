<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('travel_date');
            $table->integer('how_to_passed');
            $table->integer('rating');
            $table->integer('product_type');
            $table->index('product_id');
            $table->unsignedBigInteger('product_id')->nullable(true);
            $table->foreign('product_id')
                ->references('id')
                ->on('productos');
            $table->string('recomendation')->nullable(true);
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
        Schema::dropIfExists('encuesta_cliente');
    }
}
