<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMasterToRiskRegisterPelaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('risk_register_pelaporan', function (Blueprint $table) {
            //
            $table->integer('risk_register_master_id')->after('periode_laporan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('risk_register_pelaporan', function (Blueprint $table) {
            //
        });
    }
}
