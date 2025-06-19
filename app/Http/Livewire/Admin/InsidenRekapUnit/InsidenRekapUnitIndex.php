<?php

namespace App\Http\Livewire\Admin\InsidenRekapUnit;

use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_unit;
use Livewire\Component;

class InsidenRekapUnitIndex extends Component
{
    public $pilih_tahun; 
    public $data_tahun;
    
    public function mount()
    {
        $this->data_tahun = date('Y');
    }

    public function caridata(){
        $this->data_tahun = $this->pilih_tahun;

    }

    public function validasidata(){
        $data_medis = Insiden_medis_request::where('insiden_unit_id',null)->get();
        $data_umum = Insiden_nonmedis_request::where('insiden_unit_id',null)->get();

        $no = 0;
        foreach($data_medis as $data){
            $medis = Insiden_medis_request::find($data->id);
            $unit_id = get_unit_user($data->users_id);   
            $medis->update(
                [ "insiden_unit_id" => $unit_id]);
            $no++;
        }

        foreach($data_umum as $data){
            $umum = Insiden_nonmedis_request::find($data->id);
            $unit_id = get_unit_user($data->users_id);   
            $umum->update(
                [ "insiden_unit_id" => $unit_id]);
            $no++;
        }

        $conter = [
            "data_medis"=>$data_medis,
            "medis"=> $data_medis->count(),
            "umim"=> $data_umum->count(),
            "no"=> $no

        ];

        session()->flash('success', ' Data Berhasil di validasi sebanyak... ' .$no);

       // dd($conter);

    }

    public function grafik(){

        return redirect()->to('/insiden-rekap-unit-barchart/'.$this->data_tahun);
    }

    public function grafiktotal(){

        return redirect()->to('/insiden-rekap-unit-barchart-total/'.$this->data_tahun);
    }


    public function render()
    {
        $yearsAgo = array();
        $currentYear = date("Y");
     
        
        for ($i = 0; $i < 5; $i++) {
            $yearsAgo[] = $currentYear - $i;
        }
      
        $insiden_unit = Insiden_unit::where('aktif','Y')->get();

        return view('livewire.admin.insiden-rekap-unit.insiden-rekap-unit-index', [
            "unit" => $insiden_unit,
            "no"=> 1,
            "tahun"=>$yearsAgo
        ])->layout('layouts.main-admin');
    }
}
