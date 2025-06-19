<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelRiskRegisterMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_register_master', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->integer('users_id');
            $table->string('aktivitas_kerja');
            $table->text('pengendalian_saat_ini')->nullable();
            $table->integer('risk_kategori_id');
            $table->integer('risk_evaluasi_id');
            $table->text('akar_masalah')->nullable();
            $table->text('rencana_tindak_lanjut')->nullable();
            $table->text('laporan_singkat')->nullable();
            $table->enum('aktif',['Y','N']);
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
        Schema::dropIfExists('risk_register_master');
    }
}
