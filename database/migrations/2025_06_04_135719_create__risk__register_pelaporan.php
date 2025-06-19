<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskRegisterPelaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_register_pelaporan', function (Blueprint $table) {
            $table->id();
            $table->string('periode_laporan');
            $table->integer('unit_id');
            $table->integer('users_id');
            $table->string('aktivitas_kerja');
            $table->text('pengendalian_saat_ini')->nullable();
            $table->text('resiko')->nullable();
            $table->text('efek_resiko')->nullable();
            $table->integer('risk_kategori_id');
            $table->integer('risk_evaluasi_id');
            $table->text('akar_masalah')->nullable();
            $table->text('rencana_tindak_lanjut')->nullable();
            $table->text('laporan_singkat')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->string('target_waktu')->nullable();
            $table->integer('matrik_kontrol_f');
            $table->integer('matrik_kontrol_d');
            $table->integer('matrik_kontrol_rpn');
            $table->integer('matrik_kontrol_grade');
            $table->integer('matrik_monitoring_f');
            $table->integer('matrik_monitoring_d');
            $table->integer('matrik_monitoring_rpn');
            $table->integer('matrik_monitoring_grade');
            $table->enum('posting',['Y','N']);
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
        Schema::dropIfExists('risk_register_pelaporan');
    }
}
