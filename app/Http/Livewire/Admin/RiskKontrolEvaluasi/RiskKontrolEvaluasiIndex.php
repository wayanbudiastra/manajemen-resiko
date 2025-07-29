<?php

namespace App\Http\Livewire\Admin\RiskKontrolEvaluasi;

use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RiskKontrolEvaluasiIndex extends Component
{
    public $tahun, $pilih_tahun, $pilih_bulan, $unit, $nama_unit, $bulan;

    public function mount()
    {
        $this->tahun = date('Y');
        $this->bulan = date('m');
    }

    public function cek_data()
    {
        if ($this->pilih_bulan == null or $this->pilih_tahun == null) {
            session()->flash('error', 'Data Tahun / Bulan Masih ada yang kosong...');
        }

        $this->tahun = $this->pilih_tahun;
        $this->bulan = $this->pilih_bulan;
        // dd($this->bulan);
    }

    public function data_grafik($tahun, $bulan){

        $th = Crypt::encrypt($tahun);
        $bln = Crypt::encrypt($bulan);
        
        redirect()->to('/admin-resiko-kontrol-evaluasi-grafik/'.$th.'/'.$bln);
    }
    public function render()
    { 

        $currentYear = date('Y'); // Tahun sekarang
        $years = [];

        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }

        return view('livewire.admin.risk-kontrol-evaluasi.risk-kontrol-evaluasi-index',[
              'no' => 1,
            'data' => $years,
        ])->layout('layouts.main-admin');
    }
}
