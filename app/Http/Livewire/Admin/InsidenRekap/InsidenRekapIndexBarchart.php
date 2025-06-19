<?php

namespace App\Http\Livewire\Admin\InsidenRekap;

use App\Models\Insiden\Insiden_unit;
use Livewire\Component;

class InsidenRekapIndexBarchart extends Component
{

    public $param;
    public $medis;
    public $umum;
    public $unit;
    public $tahun;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {

        return redirect()->to('/insiden-rekap-index');
    }


    public function render()
    {
        $LabelUnit = array();
        $insidenumum = array();
        $insidenmedis = array();
        $insiden_unit = Insiden_unit::where('aktif', 'Y')->get();

        if ($this->param == '') {
            $data_tahun = date("Y");
        } else {
            $data_tahun = $this->param;
        }
        foreach ($insiden_unit as $item) {

            $LabelUnit[] = $item->nama_insiden_unit;
            $insidenumum[] = rekap_insiden_nonmedis($item->id, $data_tahun);
            $insidenmedis[] = rekap_insiden_medis($item->id, $data_tahun);
        }

        $this->medis = $insidenmedis;
        $this->umum = $insidenumum;
        $this->unit = $LabelUnit;
        $this->tahun = $data_tahun;

        return view('livewire.admin.insiden-rekap.insiden-rekap-index-barchart')->layout('layouts.main-admin');
    }
}
