<?php

namespace App\Http\Livewire\Admin\RiskEvaluasiResiko;

use App\Models\Risk\Risk_grade;
use Livewire\Component;

class RiskEvaluasiResikoIndex extends Component
{

    public $tahun, $pilih_tahun, $pilih_bulan, $unit, $nama_unit, $bulan, $periode_ini, $periode_lalu;

    public function mount()
    {
        $this->tahun = date('Y');
        $this->bulan = date('m');
        $this->periode_ini = $this->tahun . '' . $this->bulan;
         if ($this->bulan == 1)
            $this->periode_lalu = ($this->tahun - 1) . '12';
        else
            $this->periode_lalu = $this->tahun . '' . $this->validasi_bulan(($this->bulan - 1));

    }

    public function updatingSrc()
    {
        $this->resetPage();
    }

    private function validasi_bulan($bulan)
    {
        if ($bulan < 10) {
            return '0' . $bulan;
        } else {
            return $bulan;
        }
    }
    public function cek_data()
    {
        $this->periode_ini = $this->pilih_tahun . '' . $this->pilih_bulan;
        if ($this->pilih_bulan == 1)
            $this->periode_lalu = ($this->pilih_tahun - 1) . '12';
        else
            $this->periode_lalu = $this->pilih_tahun . '' . $this->validasi_bulan(($this->pilih_bulan - 1));
         // dd($this->periode_ini, $this->periode_lalu);
    }
  
    public function render()
    {
        $grade = Risk_grade::all();
        
        $years = [];
        $currentYear = date('Y'); // Tahun sekarang
        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }

        $mounts = [
            ["no" => "01", "bulan" => "Januari"],
            ["no" => "02", "bulan" => "Februari"],
            ["no" => "03", "bulan" => "Maret"],
            ["no" => "04", "bulan" => "April"],
            ["no" => "05", "bulan" => "Mei"],
            ["no" => "06", "bulan" => "Juni"],
            ["no" => "07", "bulan" => "Juli"],
            ["no" => "08", "bulan" => "Agustus"],
            ["no" => "09", "bulan" => "September"],
            ["no" => "10", "bulan" => "Oktober"],
            ["no" => "11", "bulan" => "November"],
            ["no" => "12", "bulan" => "Desember"],
        ];
       
        return view('livewire.admin.risk-evaluasi-resiko.risk-evaluasi-resiko-index', [
            'data' => $grade,
            'no'       => 1,
            'years' => $years,
            'mounts' => $mounts,

        ])->layout('layouts.main-admin');
    }
}
