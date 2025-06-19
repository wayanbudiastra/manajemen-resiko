<?php

namespace App\Http\Livewire\Admin\InsidenRekapUser;

use App\Models\Insiden\Insiden_rekap_user;
use Livewire\Component;

class InsidenRekapUserIndex extends Component
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
        $data = Insiden_rekap_user::where('tahun',$this->tahun_now)->orderby('insiden_total_data','desc')->get();
       // dd($data);

        return view('livewire.admin.insiden-rekap-user.insiden-rekap-user-index',[
            "no"=>1,
            "tahun"=> $yearsAgo,
            "data"=>$data
        ])->layout('layouts.main-admin');
    }
}
