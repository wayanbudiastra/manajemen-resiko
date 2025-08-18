<?php

namespace App\Http\Controllers;

use App\Models\Insiden\Insiden_unit;
use Illuminate\Http\Request;

class ExportExcelRiskRegisterController extends Controller
{
    //

    public function resiko_unit_rekap($tahun,$bulan){

        $unit = Insiden_unit::where('aktif', 'Y')->get();
        $currentYear = date('Y'); // Tahun sekarang
        $years = [];

        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }
        
        $pilih_tahun = $tahun;
        $pilih_bulan = $bulan;

        $daftar_bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
       
       // dd($unit,$pilih_tahun,$pilih_bulan);

        return view('report.adminresikounitrekapexcel', [
             "no" => 1,
            "data_bulan" => $daftar_bulan,
            "data_tahun" => $years,
            "data" => $unit,
            "pilih_tahun"=> $pilih_tahun,
            "pilih_bulan"=> $pilih_bulan
        ]);

    }
}
