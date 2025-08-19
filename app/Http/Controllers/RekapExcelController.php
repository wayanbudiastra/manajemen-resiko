<?php

namespace App\Http\Controllers;

use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RekapExcelController extends Controller
{
    //
    public function rekap_insiden_unit($tahun){

        $yearsAgo = array();
        $currentYear = date("Y");

        $data_tahun = $tahun;
        
        for ($i = 0; $i < 5; $i++) {
            $yearsAgo[] = $currentYear - $i;
            
        }
      
        $insiden_unit = Insiden_unit::where('aktif','Y')->get();

        return view('report.rekapinsidenunitexcel', [
            "no" => 1,
            "data" => $insiden_unit,
            "data_tahun" => $data_tahun,
        ]);

    }

    public function  rekap_insiden_medis_periode($id){
        $idx = Crypt::decrypt($id);
        $tahun_now = date('Y');
        $data = Insiden_medis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', $idx)->get();
        
        return view('report.rekapinsidenmedisperiode', [
            "no" => 1,
            "data" => $data,
            "data_tahun" => $tahun_now,
            "data_bulan" => $idx
        ]);
    }

    public function  rekap_insiden_nonmedis_periode($id){
        $idx = Crypt::decrypt($id);
        $tahun_now = date('Y');
        $data = Insiden_nonmedis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', $idx)->get();
        
        return view('report.rekapinsidennonmedisperiode', [
            "no" => 1,
            "data" => $data,
            "data_tahun" => $tahun_now,
            "data_bulan" => $idx
        ]);
    }
}
