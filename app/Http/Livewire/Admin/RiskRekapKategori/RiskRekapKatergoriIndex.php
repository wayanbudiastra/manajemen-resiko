<?php

namespace App\Http\Livewire\Admin\RiskRekapKategori;

use App\Models\Admin\Risk_register_master;
use App\Models\Risk\Risk_kategori;
use App\Models\Risk\Risk_register_pelaporan;
use Livewire\Component;

class RiskRekapKatergoriIndex extends Component
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
    
    public function render()
    {
        $data = Risk_kategori::where('aktif','Y')->get();
        $currentYear = date('Y'); // Tahun sekarang
        $years = [];

        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }

         $daftar_bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        return view('livewire.admin.risk-rekap-kategori.risk-rekap-katergori-index',[
            "no"=> 1,
            "data"=> $data,
            "data_tahun"=> $years,
            "data_bulan"=> $daftar_bulan
        ])->layout('layouts.main-admin');
    }
}
