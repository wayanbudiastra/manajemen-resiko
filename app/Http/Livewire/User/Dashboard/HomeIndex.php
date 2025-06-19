<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_user;
use App\Models\Admin\Pelatihan_user_sertifikat;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeIndex extends Component
{
    public $kelas_aktif, $kelas_inproses, $kelas_history, $kelas_sertifikat;

    public function ds_requester()
    {
        return redirect()->to('dashboard-requestor');
    }
    public function ds_kabid()
    {
        return redirect()->to('dashboard-kabid');
    }
    public function ds_finance()
    {
        return redirect()->to('dashboard-requestor');
    }
    public function ds_()
    {
        return redirect()->to('dashboard-requestor');
    }

    public function render()
    {
        // if (cek_level_requestor(auth()->user()->id) == 'Y') {
        //     return redirect()->to('dashboard-requestor');

        // } elseif (cek_level_approve1(auth()->user()->id) == 'Y') {
        //     return redirect()->to('dashboard-kabid');
        // } elseif (cek_level_approve2(auth()->user()->id) == 'Y') {
        //     return redirect()->to('dashboard-finance');
        // } elseif (cek_level_approve3(auth()->user()->id) == 'Y') {
        //     return redirect()->to('dashboard-direktur');
        // } else {
        //     return redirect()->to('dashboard-purchasing');
        // }

        try {
            $this->kelas_aktif = Pelatihan_user::where('user_id', auth()->user()->id)->whereHas('pelatihan', function ($query) {
                return $query->where('aktif', 'Y');
            })->get();
            $this->kelas_aktif = $this->kelas_aktif->count();

            $this->kelas_history = Pelatihan_user::where('user_id', auth()->user()->id)->where('kelulusan', 'Y')->count();

            //cek jumlah sertifikat
            $sertifikat = DB::table('pelatihan_user_sertifikat')
                ->leftJoin('pelatihan_user', 'pelatihan_user.id', '=', 'pelatihan_user_sertifikat.pelatihan_user_id')
                ->where('pelatihan_user.user_id', auth()->user()->id)
                ->count();
            $this->kelas_sertifikat = $sertifikat;

            //cek pelatihan yang masih aktif
            $log_pelatihan = DB::table('pelatihan_user_log')
                ->leftJoin('pelatihan_user', 'pelatihan_user.id', '=', 'pelatihan_user_log.pelatihan_user_id')
                ->where('pelatihan_user.kelulusan', 'N')
                ->where('pelatihan_user.user_id', auth()->user()->id)
                ->count();
            $this->kelas_inproses = $log_pelatihan;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        return view('livewire.user.dashboard.home-index')->layout('layouts.main');
    }
}