<?php

namespace App\Http\Livewire\Admin\InsidenRekapTotal;

use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use Livewire\Component;

class InsidenRekapTotalIndex extends Component
{
    public $medis;
    public $umum;
    public $bulan, $tahun_now;
    public $medis_januari,$medis_februari,$medis_maret,$medis_april,$medis_mei,$medis_juni,$medis_juli,$medis_agustus,$medis_september,$medis_oktober,$medis_november, $medis_desember;
    public $umum_januari,$umum_februari,$umum_maret,$umum_april,$umum_mei,$umum_juni,$umum_juli,$umum_agustus,$umum_september,$umum_oktober,$umum_november,$umum_desember;

    private function data_table($tahun){
         $tahun_nowx = $tahun;
        $this->medis_januari = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 01)->count();
        $this->medis_februari = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 02)->count();
        $this->medis_maret = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 03)->count();
        $this->medis_april = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 04)->count();
        $this->medis_mei = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 05)->count();
        $this->medis_juni = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 06)->count();
        $this->medis_juli = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 07)->count();
        $this->medis_agustus = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 8)->count();
        $this->medis_september = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 9)->count();
        $this->medis_oktober = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 10)->count();
        $this->medis_november = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 11)->count();
        $this->medis_desember = Insiden_medis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 12)->count();

        $this->umum_januari = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 01)->count();
        $this->umum_februari = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 02)->count();
        $this->umum_maret = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 03)->count();
        $this->umum_april = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 04)->count();
        $this->umum_mei = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 05)->count();
        $this->umum_juni = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 06)->count();
        $this->umum_juli = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 07)->count();
        $this->umum_agustus = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 8)->count();
        $this->umum_september = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 9)->count();
        $this->umum_oktober = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 10)->count();
        $this->umum_november = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 11)->count();
        $this->umum_desember = Insiden_nonmedis_request::whereYear('created_at', $tahun_nowx)->whereMonth('created_at', 12)->count();
    }
    public function mount(){
        $this->tahun_now = date('Y');
    }

    public function caridata(){
      $this->data_table($this->tahun_now);
    }

    public function grafik(){

        return redirect()->to('/admin-rekap-total-insiden-barchart/'.$this->tahun_now);
    }

    public function grafiktotal(){

        return redirect()->to('/admin-rekap-total-insiden-barchart-gabungan/'.$this->tahun_now);
    }
    public function render()
    {

        $yearsAgo = array();
        $currentYear = date("Y");
        
        for ($i = 0; $i < 5; $i++) {
            $yearsAgo[] = $currentYear - $i;
        }

        $this->data_table($this->tahun_now);
        $tahun_nowx = $this->tahun_now;
       
       
        $this->bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'desember'];
        return view('livewire.admin.insiden-rekap-total.insiden-rekap-total-index',[
            "tahun" => $yearsAgo,
        ])->layout('layouts.main-admin');
    }
}
