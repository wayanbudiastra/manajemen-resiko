<?php

namespace App\Http\Livewire\Admin\InsidenRekap;

use App\Models\Insiden\Insiden_medis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenRekapHistoryMedis extends Component
{
    public $param;
    public $pilih_tahun;
    public  $data_draf , $data_open , $data_pending , $data_close , $data_januari;
    public $data_februari , $data_maret , $data_april ,$data_mei ,$data_juni, $data_juli ,$data_agustus ,$data_september,$data_oktober ,$data_november ,$data_desember; 

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function edit($id){
        $idx = Crypt::encrypt($id);
        $tahun = Crypt::encrypt($this->pilih_tahun);
        return redirect()->to('/insiden-rekap-medis-status/'.$idx.'/'.$tahun);
    }

    public function data_bulan($id){
        $idx = Crypt::encrypt($id);
        $tahun = Crypt::encrypt($this->pilih_tahun);
        return redirect()->to('/insiden-rekap-medis-periode/'.$idx.'/'.$tahun);
    }
  

    public function caridata(){
        $tahun_now = $this->pilih_tahun;

        $this->data_draf = Insiden_medis_request::where('insiden_status_id',1)->whereYear('created_at', $tahun_now)->count();
        $this->data_open = Insiden_medis_request::where('insiden_status_id',2)->whereYear('created_at', $tahun_now)->count();
        $this->data_pending = Insiden_medis_request::where('insiden_status_id',3)->whereYear('created_at', $tahun_now)->count();
        $this->data_close = Insiden_medis_request::where('insiden_status_id',4)->whereYear('created_at', $tahun_now)->count();

        $this->data_januari = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 01)->count();
        $this->data_februari = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 02)->count();
        $this->data_maret = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 03)->count();
        $this->data_april = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 04)->count();
        $this->data_mei = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 05)->count();
        $this->data_juni = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 06)->count();
        $this->data_juli = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 07)->count();
        $this->data_agustus = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 8)->count();
        $this->data_september = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 9)->count();
        $this->data_oktober = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 10)->count();
        $this->data_november = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at',11)->count();
        $this->data_desember = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 12)->count();
    }

    public function render()
    {    $data = [];
        $yearsAgo = array();
        $currentYear = date("Y");
        
        for ($i = 0; $i < 5; $i++) {
            $yearsAgo[] = $currentYear - $i;
        }

        $data_draf = $this->data_draf;
        $data_open = $this->data_open ;
        $data_pending = $this->data_pending;
        $data_close = $this->data_close ;

        $data_januari = $this->data_januari ;
        $data_februari =$this->data_februari ;
        $data_maret =   $this->data_maret  ;
        $data_april = $this->data_april ;
        $data_mei = $this->data_mei;
        $data_juni =  $this->data_juni;
        $data_juli = $this->data_juli ;
        $data_agustus = $this->data_agustus ;
        $data_september = $this->data_september ;
        $data_oktober =  $this->data_oktober ;
        $data_november = $this->data_november ;
        $data_desember =  $this->data_desember ;
        return view('livewire.admin.insiden-rekap.insiden-rekap-history-medis', [
            "tahun" => $yearsAgo,
            "data" => $data, 

            "data_draf" => $data_draf,
            "data_open" => $data_open,
            "data_close"=> $data_close,
            "data_pending" => $data_pending,
         
            "data_januari" => $data_januari,
            "data_februari" => $data_februari,
            "data_maret" => $data_maret,
            "data_april" => $data_april,
            "data_mei" => $data_mei,
            "data_juni" => $data_juni,
            "data_juli" => $data_juli,
            "data_agustus" => $data_agustus,
            "data_september" => $data_september,
            "data_oktober" => $data_oktober,
            "data_november" => $data_november,
            "data_desember" => $data_desember,
        ])->layout('layouts.main-admin');
    }
}
