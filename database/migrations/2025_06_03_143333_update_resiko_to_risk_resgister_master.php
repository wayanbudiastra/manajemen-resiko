<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateResikoToRiskResgisterMaster extends Migration
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
            $table->text('resiko')->after('aktivitas_kerja');
            $table->text('efek_resiko')->after('risk_kategori_id');
        
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
