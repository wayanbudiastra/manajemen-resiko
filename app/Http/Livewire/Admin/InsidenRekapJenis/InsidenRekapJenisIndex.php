<?php

namespace App\Http\Livewire\Admin\InsidenRekapJenis;

use App\Models\Insiden\Insiden_jenis;
use Livewire\Component;

class InsidenRekapJenisIndex extends Component
{

    public $tahun_now, $pilih_tahun;

    public function mount(){
        $this->tahun_now = date("Y");
    }

    public function caridata(){

        $this->tahun_now = $this->pilih_tahun;

    }

    public function grafik(){

        return redirect()->to('/admin-insiden-total-jenis-grafik/'. $this->tahun_now );
    }

    public function grafiktotal(){

        return redirect()->to('/admin-insiden-total-jenis-grafik-total/'. $this->tahun_now );
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
      // dd(rekap_data_ktd($this->pilih_now,10));
        return view('livewire.admin.insiden-rekap-jenis.insiden-rekap-jenis-index',[
            "no"=>1,
            "tahun"=> $yearsAgo,
            "data"=>$data
        ])->layout('layouts.main-admin');
    }

   
}
