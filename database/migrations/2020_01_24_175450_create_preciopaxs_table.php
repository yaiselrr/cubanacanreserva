<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciopaxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preciopaxs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->float('precio_habitacions')->default(0.0);
            $table->float('precio_habitaciond')->default(0.0);
            $table->float('precio_ninnos')->default(0.0);
            $table->integer('capacidad_habitacions')->default(0);
            $table->integer('capacidad_habitaciond')->default(0);
            $table->integer('circuitos_id');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('preciopaxs');
    }
}
