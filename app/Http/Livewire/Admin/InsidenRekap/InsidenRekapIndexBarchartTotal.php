<?php

namespace App\Http\Livewire\Admin\InsidenRekap;

use App\Models\Insiden\Insiden_unit;
use Livewire\Component;

class InsidenRekapIndexBarchartTotal extends Component
{
    public $param;
    public $medis;
    public $totalrekap;
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
        $totaldata = array();
        $insidenmedis = array();
        $insiden_unit = Insiden_unit::where('aktif', 'Y')->get();

        if ($this->param == '') {
            $data_tahun = date("Y");
        } else {
            $data_tahun = $this->param;
        }
        foreach ($insiden_unit as $item) {

            $LabelUnit[] = $item->nama_insiden_unit;
            $totaldata[] = rekap_insiden_nonmedis($item->id, $data_tahun) + rekap_insiden_medis($item->id, $data_tahun) ;
           
        }

       
        $this->totalrekap = $totaldata;
        $this->unit = $LabelUnit;
        $this->tahun = $data_tahun;

        return view('livewire.admin.insiden-rekap.insiden-rekap-index-barchart-total')->layout('layouts.main-admin');
    }

    
}
