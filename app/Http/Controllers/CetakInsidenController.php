<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Admin\PelatihanMateri\MateriAdminPdf;
use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PDF;


class CetakInsidenController extends Controller
{
    //
    public function insiden_medis($id)
    {
        $idx = Crypt::decrypt($id);
        $data = Insiden_medis_request::find($idx);
        // dd($data);
        $pdf = PDF::loadview(
            'cetak.insidenmedis',
            [
                'data' => $data,
                'no' => '0',
                'total' => '0'
            ]
        );
        return $pdf->stream();
    }

    public function insiden_nonmedis($id)
    {
        $idx = Crypt::decrypt($id);
        $data = Insiden_nonmedis_request::find($idx);
        // dd($data);
        $pdf = PDF::loadview(
            'cetak.insidennonmedis',
            [
                'data' => $data,
                'no' => '0',
                'total' => '0'
            ]
        );
        return $pdf->stream();
    }
}
