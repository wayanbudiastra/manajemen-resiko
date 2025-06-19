<?php

namespace App\Http\Livewire\Admin\InsidenRekapJenis;

use App\Models\Insiden\Insiden_jenis;
use Illuminate\Support\Arr;
use Livewire\Component;

class InsidenRekapJenisBarchart extends Component
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

        return redirect()->to('/admin-insiden-total-jenis');
    }
    public function render()
    {
        $LabelUnit = array();
        $insidenumum = array();
        $insidenmedis = array();
        $tahun_now = $this->param;
        $data = Insiden_jenis::where('aktif','Y')->get();
       
        // dd($data);
            foreach ($data as $item) {

                $LabelUnit[] =$item->nama_insiden_jenis;
                $insidenumum[] =  rekap_insiden_jenis_nonmedis($item->id,$tahun_now);
                $insidenmedis[] =   rekap_insiden_jenis_medis($item->id,$tahun_now);
            }
    
            $this->medis = $insidenmedis;
            $this->umum = $insidenumum;
            $this->unit = $LabelUnit;
            $this->tahun = $this->param;
      // dd($this->unit);
       
    
        return view('livewire.admin.insiden-rekap-jenis.insiden-rekap-jenis-barchart')->layout('layouts.main-admin');
    }
    
}
