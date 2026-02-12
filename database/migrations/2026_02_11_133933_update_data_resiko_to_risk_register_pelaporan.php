<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDataResikoToRiskRegisterPelaporan extends Migration
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
             $table->enum('realisasi_penganganan',['Y','N'])->default('N');
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
