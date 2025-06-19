<?php

namespace App\Http\Livewire\Admin\InsidenRekap;

use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_unit;
use Livewire\Component;

class InsidenRekapIndex extends Component

{
    public $pilih_tahun; 
    public $data_tahun;
    
    public function mount()
    {
        $this->data_tahun = date('Y');
    }

    public function caridata(){
        $this->data_tahun = $this->pilih_tahun;

    }

    public function grafik(){

        return redirect()->to('/insiden-rekap-index-barchart/'.$this->data_tahun);
    }

    public function grafiktotal(){

        return redirect()->to('/insiden-rekap-index-barchart-total/'.$this->data_tahun);
    }

    public function render()
    {

        $yearsAgo = array();
        $currentYear = date("Y");
     
        
        for ($i = 0; $i < 5; $i++) {
            $yearsAgo[] = $currentYear - $i;
        }
      
        $insiden_unit = Insiden_unit::where('aktif','Y')->get();
       // dd($insiden_unit);
        return view('livewire.admin.insiden-rekap.insiden-rekap-index', [
          
            "unit" => $insiden_unit,
            "no"=> 1,
            "tahun"=>$yearsAgo
        ])->layout('layouts.main-admin');
    }
}
