<?php

namespace App\Http\Livewire\Admin\RiskRekapGrade;

use App\Models\Risk\Risk_grade;
use App\Models\Risk\Risk_register_master;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RiskRekapGradeDetail extends Component
{

public $param, $src, $periode, $grade , $grade_selected;

public function mount($param = null)
{
  $this->param = $param;
  $this->grade = Crypt::decrypt($this->param);

}

public function pilih_grade(){

   
    $this->grade = $this->grade_selected;

}


public function render()
    {
        try {
            
            $master_grade = Risk_grade::all();

            $data = Risk_register_master::where('matrik_monitoring_grade',$this->grade)->orderby('id', 'desc')->paginate(15);
            
            if (strlen($this->src) > 1) {
                $data = Risk_register_master::where("aktivitas_kerja", "like", "%{$this->src}%")->where('matrik_monitoring_grade',$this->grade)->orderby('id', 'desc')->paginate(15);
            }

        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.risk-rekap-grade.risk-rekap-grade-detail',[
            "no"=> 1,
            "data"=> $data,
            "master_grade" => $master_grade

        ])->layout('layouts.main-admin');

    }
}
