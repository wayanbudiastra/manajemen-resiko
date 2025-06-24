<?php

namespace App\Http\Livewire\Admin\RiskVerifikasi;

use App\Models\Insiden\Insiden_unit;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RiskVerifikasiIndex extends Component
{

    public $tahun, $pilih_tahun, $pilih_bulan, $unit, $nama_unit, $bulan;

    public function mount()
    {
        $this->tahun = date('Y');
        $this->bulan = date('m');
    }

    public function cek_data($id){

        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-resiko-verifikasi-unit/'.$idx);
    }

    public function render()
    {
        $data = Insiden_unit::where('aktif','Y')->get();

        return view('livewire.admin.risk-verifikasi.risk-verifikasi-index',[
            "no"=>1,
            "data"=> $data
        ]
        )->layout('layouts.main-admin');
    }
}
