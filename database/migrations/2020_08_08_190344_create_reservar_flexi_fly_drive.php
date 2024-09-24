<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservarFlexiFlyDrive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservar_flexi_drives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->unsignedBigInteger('autos_flexi_fly_drives_id');
            $table->foreign('autos_flexi_fly_drives_id')->references('id')->on('autos_flexi_fly_drives')->onDelete('cascade');
            $table->string('lugar_entrega');
            $table->time('hora_entrega');
            $table->string('lugar_recogida');
            $table->time('hora_recogida');
            $table->integer('cantidad_noches');
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_ninnos')->nullable();
            $table->float('precio_total', 8, 2);

            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('status_reservas')->onDelete('cascade');

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
        Schema::dropIfExists('reservar_flexi_fly_drives');
    }
}
