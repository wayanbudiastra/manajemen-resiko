<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Insiden\Insiden_unit_user;
use App\Models\Risk\Risk_register_master;
use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_proses;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeRequestor extends Component
{
    public $portal_rendah, $portal_sedang, $portal_tinggi, $portal_ekstrim, $labels, $data;

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

    public function render()
    {
        try {
            $portal = Portal_request::where('users_id', auth()->user()->id)->get();

            $counter_draf = 0;
            $counter_finis = 0;
            $counter_reject = 0;
            $history_count = 0;

            foreach ($portal as $item) {
                $history_count = $history_count + 1;
                $cek_progres = Portal_request_proses::where('portal_request_id', $item->id)->get();
                if ($cek_progres->count() == 0) {
                    $counter_draf = $counter_draf + 1;
                }
                $cek_finis = Portal_request_proses::where('portal_request_id', $item->id)
                    ->where('portal_status_id', '5')->where('portal_level_id', '5')->get();
                if ($cek_finis->count() > 0) {
                    $counter_finis = $counter_finis + 1;
                }

                $cek_reject = Portal_request_proses::where('portal_request_id', $item->id)
                    ->where('portal_status_id', '4')->get();
                if ($cek_reject->count() > 0) {
                    $counter_reject = $counter_reject + 1;
                }
            }
            //dd($portal);


            $ds_rendah = Risk_register_master::where('unit_id', $this->cek_unit())->where('matrik_kontrol_grade', '1')->count();

            $ds_sedang = Risk_register_master::where('unit_id', $this->cek_unit())->where('matrik_kontrol_grade', '2')->count();

            $ds_tinggi = Risk_register_master::where('unit_id', $this->cek_unit())->where('matrik_kontrol_grade', '3')->count();

            $ds_ekstrim = Risk_register_master::where('unit_id', $this->cek_unit())->where('matrik_kontrol_grade', '4')->count();

            $this->portal_rendah = $ds_rendah;

            // dd($data_reject);
            $this->portal_tinggi = $ds_tinggi;


            $this->portal_ekstrim = $ds_ekstrim;

            $this->portal_sedang = $ds_sedang;

            $this->labels = ['Rendah', 'Sedang', 'Tinggi', 'Ekstrim'];
            $this->data = [$ds_rendah, $ds_sedang, $ds_tinggi, $ds_ekstrim];

            // dd($counter_finis);

            $data_risk = Risk_register_master::where('unit_id', $this->cek_unit())->where('matrik_kontrol_grade', 4)->limit(10)->get();
        
       // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        return view('livewire.user.dashboard.home-requestor',[
            "no"=>1,
            "data_risk"=> $data_risk
        ])->layout('layouts.main');
    }
}
