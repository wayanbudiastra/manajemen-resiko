<?php

namespace App\Http\Livewire\User\RiskRegisterRekap;

use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_user;
use Livewire\Component;

class RiskRegisterMonitoringEvaluasi extends Component
{

    public $tahun , $pilih_tahun, $unit, $nama_unit, $label;

    public $rendah_sekali , $rendah , $sedang , $tinggi , $tinggi_sekali;


    public function mount()
    {
        $this->tahun = date('Y');
    }
    
    public function cek_data(){

        $this->tahun = $this->pilih_tahun;

    }

    function cek_unit()
    {
        $user_unit = "";
        $user_unit = Insiden_unit_user::where('users_id', auth()->user()->id)->first();

        if ($user_unit == null) {
            dd("Akun anda belum di mapping ke unit kerja, silahkan mengubungi Tim PMKP ");
        }

        $user_unit_id = $user_unit->insiden_unit_id;
        return $user_unit_id;
    }

    function cek_nama_unit(){
        $nama_unit = "";

        $data = Insiden_unit::find($this->cek_unit());
        if($data){
            $nama_unit = $data->nama_insiden_unit;
        }

        return $nama_unit;
    }

    public function render()
    {
        $currentYear = date('Y'); // Tahun sekarang
        $years = [];

        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }
        $this->unit = $this->cek_unit();
        $this->nama_unit = $this->cek_nama_unit();

        $this->label = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        $this->rendah_sekali = [
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '01', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '02', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '03', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '04', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '05', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '06', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '07', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '08', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '09', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '10', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '11', 1),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '12', 1),
        ];
        $this->rendah = [
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '01', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '02', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '03', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '04', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '05', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '06', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '07', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '08', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '09', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '10', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '11', 2),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '12', 2),
        ];
        $this->sedang = [
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '01', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '02', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '03', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '04', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '05', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '06', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '07', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '08', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '09', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '10', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '11', 3),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '12', 3),
        ];
        $this->tinggi = [
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '01', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '02', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '03', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '04', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '05', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '06', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '07', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '08', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '09', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '10', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '11', 4),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '12', 4),
        ];
        $this->tinggi_sekali =[
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '01', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '02', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '03', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '04', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '05', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '06', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '07', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '08', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '09', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '10', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '11', 5),
            rekap_risk_evaluasi_unit($this->unit, $this->tahun, '12', 5),
        ];

 
        return view('livewire.user.risk-register-rekap.risk-register-monitoring-evaluasi', [
            "no" => 1,
            "data" => $years,
        ])->layout('layouts.main');
    }
    
   
}
