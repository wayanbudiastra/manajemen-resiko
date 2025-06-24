<?php

namespace App\Http\Livewire\Admin\RiskVerifikasi;

use App\Models\Risk\Risk_register_master;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RiskVerifikasiUnit extends Component
{  public $param;

    protected $listeners = ['aktifConfirmed'];
    
    public function mount($param = null)
    {
        $this->param = Crypt::decrypt($param);
    }

        public function aktifConfirmed($id)
    {

        try {
            $data = Risk_register_master::find($id);
            $data->update([
                "aktif"=>"Y"
            ]);
            session()->flash('success', 'Data Berhasil di aktivasi....');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        
    }


    public function kembali(){
        return redirect()->to('admin-resiko-verifikasi');
    }


    public function render()
    {
        $data = Risk_register_master::where('unit_id',$this->param)->where('aktif','N')->get();

        return view('livewire.admin.risk-verifikasi.risk-verifikasi-unit',[
            "no"=> 1,
            "data"=> $data
        ])->layout('layouts.main-admin');
    }
}
