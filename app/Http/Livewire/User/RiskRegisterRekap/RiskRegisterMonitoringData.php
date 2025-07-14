<?php

namespace App\Http\Livewire\User\RiskRegisterRekap;

use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_user;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class RiskRegisterMonitoringData extends Component
{
    public $param1, $param2, $warna, $label, $label_data, $unit, $nama_unit, $data_grade;

    public $rendah_sekali , $rendah , $sedang , $tinggi , $tinggi_sekali;

    public function mount($param1 = null, $param2= null){

        $this->param1 = $param1;
        $this->param2 = $param2;

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

    public function kembali(){

        return redirect()->to('risk-register-rekap-monitoring-unit-index');
    }

    public function cek_warna(){

         $data = Crypt::decrypt($this->param2);
         if($data==1){
            $warna = "green";
         }elseif($data==2){
            $warna = "blue";
         }elseif($data==3){
            $warna = "yellow";
         }elseif($data==4){
            $warna = "orange";
         }else{
            $warna = "red";
         }
         return $warna;

    }

   
    public function cek_label(){

         $data = Crypt::decrypt($this->param2);
         if($data==1){
            $label = "Rendah Sekali";
         }elseif($data==2){
            $label = "Rendah";
         }elseif($data==3){
            $label = "Sedang";
         }elseif($data==4){
            $label = "Tinggi";
         }else{
            $label = "Tinggi Sekali";
         }

         return $label;

    }

    public function render()
    {
        $tahun = Crypt::decrypt($this->param1);
        $data = Crypt::decrypt($this->param2);
      
 $this->unit = $this->cek_unit();
        $this->nama_unit = $this->cek_nama_unit();

         $this->label = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

         $this->warna = $this->cek_warna();
         $this->label_data = $this->cek_label();
         
         $this->data_grade = [
            rekap_risk_evaluasi_unit($this->unit,$tahun,'01',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'02',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'03',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'04',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'05',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'06',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'07',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'08',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'09',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'10',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'11',$data),
            rekap_risk_evaluasi_unit($this->unit,$tahun,'12',$data),
         ];

         $this->rendah_sekali = [
            rekap_risk_evaluasi_unit($this->unit, $tahun, '01', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '02', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '03', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '04', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '05', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '06', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '07', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '08', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '09', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '10', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '11', 1),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '12', 1),
        ];
        $this->rendah = [
            rekap_risk_evaluasi_unit($this->unit, $tahun, '01', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '02', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '03', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '04', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '05', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '06', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '07', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '08', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '09', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '10', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '11', 2),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '12', 2),
        ];
        $this->sedang = [
            rekap_risk_evaluasi_unit($this->unit, $tahun, '01', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '02', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '03', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '04', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '05', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '06', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '07', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '08', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '09', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '10', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '11', 3),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '12', 3),
        ];
        $this->tinggi = [
            rekap_risk_evaluasi_unit($this->unit, $tahun, '01', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '02', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '03', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '04', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '05', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '06', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '07', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '08', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '09', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '10', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '11', 4),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '12', 4),
        ];
        $this->tinggi_sekali =[
            rekap_risk_evaluasi_unit($this->unit, $tahun, '01', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '02', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '03', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '04', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '05', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '06', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '07', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '08', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '09', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '10', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '11', 5),
            rekap_risk_evaluasi_unit($this->unit, $tahun, '12', 5),
        ];



        return view('livewire.user.risk-register-rekap.risk-register-monitoring-data',[
            "th"=> $tahun,
            "data"=> $data
        ])->layout('layouts.main');
    }
}
