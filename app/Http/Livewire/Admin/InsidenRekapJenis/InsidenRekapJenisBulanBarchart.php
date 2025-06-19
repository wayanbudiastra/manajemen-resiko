<?php

namespace App\Http\Livewire\Admin\InsidenRekapJenis;

use App\Models\Insiden\Insiden_jenis;
use Livewire\Component;

class InsidenRekapJenisBulanBarchart extends Component
{
    public $param, $bulan, $tahun;
    public $rekap_ktd, $rekap_ktc, $rekap_knc, $rekap_kpcs, $rekap_sentinel;

    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function kembali()
    {

        return redirect()->to('/admin-insiden-total-jenis');
    }

    public function render()
    {
        // $data = Insiden_jenis::where('aktif','Y')->get();
        // foreach($data as $item){

        // }
        $this->tahun = $this->param;
        $this->rekap_ktd = [ rekap_data_ktd($this->param,01) , rekap_data_ktd($this->param,02) , rekap_data_ktd($this->param,03) ,rekap_data_ktd($this->param,04) ,rekap_data_ktd($this->param,05) ,rekap_data_ktd($this->param,06) ,rekap_data_ktd($this->param,07) ,rekap_data_ktd($this->param,8) ,rekap_data_ktd($this->param,9) ,rekap_data_ktd($this->param,10) ,rekap_data_ktd($this->param,11) ,rekap_data_ktd($this->param,12) ];
        $this->rekap_ktc = [ rekap_data_ktc($this->param,01) , rekap_data_ktc($this->param,02) , rekap_data_ktc($this->param,03) ,rekap_data_ktc($this->param,04) ,rekap_data_ktc($this->param,05) ,rekap_data_ktc($this->param,06) ,rekap_data_ktc($this->param,07) ,rekap_data_ktc($this->param,8) ,rekap_data_ktc($this->param,9) ,rekap_data_ktc($this->param,10) ,rekap_data_ktc($this->param,11) ,rekap_data_ktc($this->param,12) ];
        $this->rekap_knc = [ rekap_data_knc($this->param,01) , rekap_data_knc($this->param,02) , rekap_data_knc($this->param,03) ,rekap_data_knc($this->param,04) ,rekap_data_knc($this->param,05) ,rekap_data_knc($this->param,06) ,rekap_data_knc($this->param,07) ,rekap_data_knc($this->param,8) ,rekap_data_knc($this->param,9) ,rekap_data_knc($this->param,10) ,rekap_data_knc($this->param,11) ,rekap_data_knc($this->param,12) ];
        $this->rekap_kpcs = [ rekap_data_kpcs($this->param,01) , rekap_data_kpcs($this->param,02) , rekap_data_kpcs($this->param,03) ,rekap_data_kpcs($this->param,04) ,rekap_data_kpcs($this->param,05) ,rekap_data_kpcs($this->param,06) ,rekap_data_kpcs($this->param,07) ,rekap_data_kpcs($this->param,8) ,rekap_data_kpcs($this->param,9) ,rekap_data_kpcs($this->param,10) ,rekap_data_kpcs($this->param,11) ,rekap_data_kpcs($this->param,12) ];
        $this->rekap_sentinel = [ rekap_data_sentinel($this->param,01) , rekap_data_sentinel($this->param,02) , rekap_data_sentinel($this->param,03) ,rekap_data_sentinel($this->param,04) ,rekap_data_sentinel($this->param,05) ,rekap_data_sentinel($this->param,06) ,rekap_data_sentinel($this->param,07) ,rekap_data_sentinel($this->param,8) ,rekap_data_sentinel($this->param,9) ,rekap_data_sentinel($this->param,10) ,rekap_data_sentinel($this->param,11) ,rekap_data_sentinel($this->param,12) ];
        $this->bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'desember'];

        return view('livewire.admin.insiden-rekap-jenis.insiden-rekap-jenis-bulan-barchart')->layout('layouts.main-admin');
    }
}
