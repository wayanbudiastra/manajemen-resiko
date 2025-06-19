<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGradeToRiskRegisterMaster extends Migration
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
            $table->integer('matrik_monitoring_grade')->default(1);
            $table->integer('matrik_kontrol_grade')->default(1);
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
