<?php

namespace App\Http\Livewire\User\Pelatihan;

use App\Models\Admin\Pelatihan_soal;
use App\Models\Admin\Pelatihan_user;
use App\Models\Admin\Pelatihan_user_log;
use App\Models\Admin\Pelatihan_user_log_soal;
use Livewire\Component;

class PelatihanPretesHasil extends Component
{
    public $param;
    public $status_materi, $status_pretes, $status_postes;
    public $soal_id = [];
    public $jawabanSelected = [];
    public $pelatian_user_id;
    public $sisa_limit;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('pelatihan-user-detail/' .  $this->pelatihan_user_id);
    }
    public function ulang()
    {
        //dd($this->pelatihan_user_id);
        return redirect()->to('/pelatihan-user-pretes/' . $this->pelatihan_user_id);
    }

    public function render()
    {
        $log = Pelatihan_user_log::find($this->param);
        $pelatihan_soal = Pelatihan_soal::where('pelatihan_id', $log->pelatihan_user->pelatihan_id)->get();
        $log_soal = Pelatihan_user_log_soal::where('pelatihan_user_log_id', $log->id)->get();
        // dd($log_soal);
        $this->pelatihan_user_id = $log->pelatihan_user_id;

        $data = Pelatihan_user::find($log->pelatihan_user->id);
        $this->nama_pelatihan = $data->pelatihan->nama_pelatihan;
        $this->jenis_pelatihan = $data->pelatihan->kelas_jenis->nama_kelas_jenis;
        $this->pelatihan_skill = $data->pelatihan->kelas_skill->nama_kelas_skill;
        $this->total_jam = $data->pelatihan->total_jam;
        $this->keterangan = $data->pelatihan->keterangan;
        $this->subpelatihan = $data->pelatihan->subpelatihan;
        $this->limit_akses = $data->pelatihan->limit_akses;
        $this->total_bobot = $data->pelatihan->total_bobot;
        $this->kelulusan = $data->pelatihan->kelulusan;

        $this->log_pretes = Pelatihan_user_log::where('pelatihan_user_id', $data->id)->where('kegiatan_id', '1')->count();
        $this->sisa_limit = $this->limit_akses - $this->log_pretes;
        return view('livewire.user.pelatihan.pelatihan-pretes-hasil', [
            "log" => $log,
            "soal" => $pelatihan_soal,
            "log_soal" => $log_soal,
            "no" => 1,
            "cek_jawaban_a" => "",
            "cek_jawaban_b" => "",
            "cek_jawaban_c" => "",
            "cek_jawaban_d" => "",

        ])->layout('layouts.main');
    }
}