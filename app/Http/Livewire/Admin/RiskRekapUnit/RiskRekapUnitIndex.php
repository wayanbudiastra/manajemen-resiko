<?php

namespace App\Http\Livewire\Admin\RiskRekapUnit;

use App\Models\Insiden\Insiden_unit;
use Livewire\Component;

class RiskRekapUnitIndex extends Component
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

    public function cetak_excel()
    {
        return redirect()->to('/admin-resiko-unit-rekap-excel/'.$this->tahun.'/'.$this->bulan);
    }
    public function render()
    {
        $unit = Insiden_unit::where('aktif', 'Y')->get();
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
       
        return view('livewire.admin.risk-rekap-unit.risk-rekap-unit-index', [
            "no" => 1,
            "data_bulan" => $daftar_bulan,
            "data_tahun" => $years,
            "data" => $unit
        ])->layout('layouts.main-admin');
    }
}
