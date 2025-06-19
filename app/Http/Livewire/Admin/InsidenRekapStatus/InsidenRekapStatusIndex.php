<?php

namespace App\Http\Livewire\Admin\InsidenRekapStatus;

use App\Models\Insiden\Insiden_jenis;
use App\Models\Insiden\Insiden_rekap_user;
use Livewire\Component;

class InsidenRekapStatusIndex extends Component
{

    public $tahun_now, $pilih_tahun;

    public function mount(){
        $this->tahun_now = date("Y");
    }

    public function caridata(){

        $this->tahun_now = $this->pilih_tahun;

    }

    public function grafik(){

        return redirect()->to('/admin-insiden-total-user-grafik/'. $this->tahun_now );
    }

    public function grafiktotal(){

        return redirect()->to('/admin-insiden-total-user-grafik-total/'. $this->tahun_now );
    }

    public function render()
    {
        $yearsAgo = array();
        $currentYear = date("Y");
     
        for ($i = 0; $i < 5; $i++) {
            $yearsAgo[] = $currentYear - $i;
        } 
        $data = Insiden_jenis::where('aktif','Y')->get();
       // dd($data);
       
        return view('livewire.admin.insiden-rekap-status.insiden-rekap-status-index',[
            "no"=>1,
            "tahun"=> $yearsAgo,
            "data"=>$data
        ])->layout('layouts.main-admin');
    }
}
