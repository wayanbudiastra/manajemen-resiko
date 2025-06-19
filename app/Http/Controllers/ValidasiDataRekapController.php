<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Cetak\InsidenMedis;
use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_rekap_user;
use Illuminate\Http\Request;

class ValidasiDataRekapController extends Controller
{
    //

    public function rekap_medis(){

        $tahun = date('Y');
        $data = Insiden_medis_request::all();
        foreach($data as $item){
            //cek data
            $user_rekap = Insiden_rekap_user::where('tahun',$tahun)->where('users_id',$item->users_id)->first();
            if($user_rekap){
                $konter = $user_rekap->insiden_medis + 1;
                $total = $konter + $user_rekap->insiden_nonmedis;
                $user_rekap->update(['insiden_medis'=> $konter,
                "insiden_total_data"=> $total,
                ]);
            }else{
                Insiden_rekap_user::create([
                    "users_id"=>$item->users_id,
                    "tahun"=>$tahun,
                    "insiden_medis"=>1,
                    "insiden_nonmedis"=>0,
                    "insiden_total_data"=>1,                 
                ]);
            }
        }
    }

    public function rekap_nonmedis(){

        $tahun = date('Y');
        $data = Insiden_nonmedis_request::all();
        foreach($data as $item){
            //cek data
            $user_rekap = Insiden_rekap_user::where('tahun',$tahun)->where('users_id',$item->users_id)->first();
            if($user_rekap){
                $konter = $user_rekap->insiden_nonmedis + 1;
                $total = $konter + $user_rekap->insiden_medis;
                $user_rekap->update(['insiden_nonmedis'=> $konter,
                "insiden_total_data"=> $total,
                ]);
            }else{
                Insiden_rekap_user::create([
                    "users_id"=>$item->users_id,
                    "tahun"=>$tahun,
                    "insiden_medis"=>0,
                    "insiden_nonmedis"=>1,
                    "insiden_total_data"=>1,                 
                ]);
            }
        }
    }
}
