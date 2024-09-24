<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcursionesTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excursiones_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('descripcion')->nullable();
            $table->string('locale')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('excursiones_id');
            $table->unique(['excursiones_id','locale'/*,'question'*/]);
            $table->foreign('excursiones_id')->references('id')->on('excursiones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excursiones_traslations');
    }
}
