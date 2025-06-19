<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRiskEvaluasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_evaluasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_evaluasi');
            $table->text('keterangan')->nullable();
            $table->enum('aktif',['Y','N'])->default('Y');
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
        Schema::dropIfExists('table_risk_evaluasi');
    }
}
