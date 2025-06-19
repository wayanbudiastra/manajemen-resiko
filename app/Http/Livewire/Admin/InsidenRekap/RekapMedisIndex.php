<?php

namespace App\Http\Livewire\Admin\InsidenRekap;

use App\Http\Livewire\Cetak\InsidenMedis;
use App\Models\Insiden\Insiden_medis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RekapMedisIndex extends Component
{

    public function edit($id){
        $idx = Crypt::encrypt($id);
        $tahun_now = date('Y');
        $tahun = Crypt::encrypt($tahun_now);
        return redirect()->to('/insiden-rekap-medis-status/'.$idx.'/'.$tahun);
    }

    public function data_bulan($id){
        $idx = Crypt::encrypt($id);
        $tahun_now = date('Y');
        $tahun = Crypt::encrypt($tahun_now);
        return redirect()->to('/insiden-rekap-medis-periode/'.$idx.'/'.$tahun);
    }

    public function data_history(){
        return redirect()->to('insiden-rekap-history-medis');
     }

    public function render()
    {
        $bulan_now = date('m');
        $tahun_now = date('Y');
       
       // $data = Insiden_medis_request::whereYear('created_at', $tahun_now)->get();
        $data_draf = Insiden_medis_request::where('insiden_status_id',1)->whereYear('tgl_insiden', $tahun_now)->count();
        $data_open = Insiden_medis_request::where('insiden_status_id',2)->whereYear('tgl_insiden', $tahun_now)->count();
        $data_pending = Insiden_medis_request::where('insiden_status_id',3)->whereYear('tgl_insiden', $tahun_now)->count();
        $data_close = Insiden_medis_request::where('insiden_status_id',4)->whereYear('tgl_insiden', $tahun_now)->count();
        $data_cencel = Insiden_medis_request::where('insiden_status_id',5)->whereYear('tgl_insiden', $tahun_now)->count();

        $data_januari = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 01)->count();
        $data_februari = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 02)->count();
        $data_maret = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 03)->count();
        $data_april = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 04)->count();
        $data_mei = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 05)->count();
        $data_juni = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 06)->count();
        $data_juli = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 07)->count();
        $data_agustus = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 8)->count();
        $data_september = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 9)->count();
        $data_oktober = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 10)->count();
        $data_november = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden',11)->count();
        $data_desember = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', 12)->count();
        

       // dd($data_close);
        return view('livewire.admin.insiden-rekap.rekap-medis-index',
        [
            "data_draf" => $data_draf,
            "data_open" => $data_open,
            "data_close"=> $data_close,
            "data_pending" => $data_pending,
            "data_cencel" => $data_cencel,
            "data_tahun" => $tahun_now,

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
