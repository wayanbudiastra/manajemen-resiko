<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRpnToRiskRegisterMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('risk_register_master', function (Blueprint $table) {
            //
            $table->string('penanggung_jawab')->nullable();
            $table->date('target_waktu')->nullable();
            $table->integer('matrik_kontrol_f');
            $table->integer('matrik_kontrol_d');
            $table->integer('matrik_kontrol_rpn');
            $table->integer('matrik_monitoring_f');
            $table->integer('matrik_monitoring_d');
            $table->integer('matrik_monitoring_rpn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('risk_register_master', function (Blueprint $table) {
            //
        });
    }
}
