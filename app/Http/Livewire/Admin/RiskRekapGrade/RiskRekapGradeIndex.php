<?php

namespace App\Http\Livewire\Admin\RiskRekapGrade;

use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_user;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RiskRekapGradeIndex extends Component
{
    public $tahun , $pilih_tahun, $unit, $nama_unit;
    
    public function mount()
    {
        $this->tahun = date('Y');
    }

    public function cek_data(){
        $this->tahun = $this->pilih_tahun;
    }

    function cek_unit()
    {
        $user_unit = "";
        $user_unit = Insiden_unit_user::where('users_id', auth()->user()->id)->first();

        if ($user_unit == null) {
            dd("Akun anda belum di mapping ke unit kerja, silahkan mengubungi Tim PMKP ");
        }

        $user_unit_id = $user_unit->insiden_unit_id;
        return $user_unit_id;
    }

    function cek_nama_unit(){
        $nama_unit = "";

        $data = Insiden_unit::find($this->cek_unit());
        if($data){
            $nama_unit = $data->nama_insiden_unit;
        }

        return $nama_unit;
    }

    public function detail($id){

        $idx = Crypt::encrypt($id);
        
        return redirect()->to('admin-resiko-grade-rekap-detail/'.$idx);
    
    }
   
    public function render()
    {
        $currentYear = date('Y'); // Tahun sekarang
        $years = [];

        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }
        $this->unit = $this->cek_unit();
        $this->nama_unit = $this->cek_nama_unit();

        
        return view('livewire.admin.risk-rekap-grade.risk-rekap-grade-index', [
          
            'no' => 1,
            'data' => $years,
        
        ])->layout('layouts.main-admin');
       
    }
}
