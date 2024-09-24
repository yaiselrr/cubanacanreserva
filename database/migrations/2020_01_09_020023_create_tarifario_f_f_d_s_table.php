<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifarioFFDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifario_f_f_d_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('noches');
            $table->string('auto_mercedes_benz_b180_1auto_1hab');
            $table->string('auto_mercedes_benz_b180_1auto_2hab');
            $table->string('auto_mercedes_benz_c200_1auto_1hab');
            $table->string('auto_mercedes_benz_c200_1auto_2hab');
            $table->string('auto_maxus_g10_1auto_1hab');
            $table->string('auto_maxus_g10_1auto_2hab');
            $table->string('auto_hyundai_santa_fe_1auto_1hab');
            $table->string('auto_hyundai_santa_fe_1auto_2hab');
            $table->string('auto_mercedes_benz_e200_1auto_1hab');
            $table->string('auto_mercedes_benz_e200_1auto_2hab');
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
        Schema::dropIfExists('tarifario_f_f_d_s');
    }
}
