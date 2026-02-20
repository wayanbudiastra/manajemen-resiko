<?php

namespace App\Http\Livewire\Admin\RiskKontrolEvaluasi;

use App\Models\Risk\Risk_grade;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RiskKontrolEvaluasiGrafik extends Component
{

    public $param, $src, $periode, $grade, $grade_selected, $bulan, $tahun, $data_kontrol, $data_evaluasi;

    public function mount($param = null, $param1 = null)
    {
        $this->bulan = Crypt::decrypt($param);
        $this->tahun = Crypt::decrypt($param1);
    }
    
    public function kembali(){

        return redirect()->to('admin-resiko-kontrol-evaluasi');
  
    }

    public function render()
    {
        $data = [
            "tahun" => $this->tahun,
            "bulan" => $this->bulan
        ];

        $grading = Risk_grade::get();
        $kontrol = array();
        $evaluasi = array();
        $label = array();

        foreach ($grading as $item) {
            array_push($label, $item->nama_grade);
            array_push($kontrol, rekap_risk_unit_kontrol_all($this->tahun, $this->bulan, $item->id));
            array_push($evaluasi, rekap_risk_unit_monitoring_all($this->tahun, $this->bulan, $item->id));
        }

        // dd($label,$kontrol,$evaluasi);

        return view(
            'livewire.admin.risk-kontrol-evaluasi.risk-kontrol-evaluasi-grafik',
            [
                "label" => $label,
                "kontrol" => $kontrol,
                "evaluasi" => $evaluasi
            ]
        )->layout('layouts.main-admin');
    }
}
