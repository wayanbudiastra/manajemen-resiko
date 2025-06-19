<?php

namespace App\Http\Livewire\Admin\InsidenRekapTotal;

use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use Livewire\Component;

class InsidenRekapTotalBarchart extends Component
{
    public $medis, $tahun;
    public $umum, $param;
    public $bulan, $tahun_now;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali(){
        return redirect()->to('admin-rekap-total-insiden');
    }
    public function render()
    {

        $tahun_now = $this->param;
        $this->tahun = $this->param;
        $medis_januari = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 01)->count();
        $medis_februari = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 02)->count();
        $medis_maret = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 03)->count();
        $medis_april = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 04)->count();
        $medis_mei = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 05)->count();
        $medis_juni = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 06)->count();
        $medis_juli = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 07)->count();
        $medis_agustus = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 8)->count();
        $medis_september = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 9)->count();
        $medis_oktober = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 10)->count();
        $medis_november = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 11)->count();
        $medis_desember = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 12)->count();

        $umum_januari = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 01)->count();
        $umum_februari = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 02)->count();
        $umum_maret = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 03)->count();
        $umum_april = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 04)->count();
        $umum_mei = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 05)->count();
        $umum_juni = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 06)->count();
        $umum_juli = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 07)->count();
        $umum_agustus = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 8)->count();
        $umum_september = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 9)->count();
        $umum_oktober = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 10)->count();
        $umum_november = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 11)->count();
        $umum_desember = Insiden_nonmedis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', 12)->count();

        $this->medis = [$medis_januari, $medis_februari, $medis_maret, $medis_april, $medis_mei, $medis_juni, $medis_juli, $medis_agustus, $medis_september, $medis_oktober, $medis_november, $medis_desember];
        $this->umum = [$umum_januari, $umum_februari, $umum_maret, $umum_april, $umum_mei, $umum_juni, $umum_juli, $umum_agustus, $umum_september, $umum_oktober, $umum_november, $umum_desember];
        $this->bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'desember'];

        return view('livewire.admin.insiden-rekap-total.insiden-rekap-total-barchart')->layout('layouts.main-admin');
    }
}
