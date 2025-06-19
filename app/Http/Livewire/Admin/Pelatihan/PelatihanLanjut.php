<?php

namespace App\Http\Livewire\Admin\Pelatihan;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_materi;
use App\Models\Admin\Pelatihan_soal;
use App\Models\Admin\Pelatihan_user;
use App\Models\Master_v1\Kelas_jenis;
use App\Models\Master_v1\Kelas_skill;
use Livewire\Component;

class PelatihanLanjut extends Component
{
    public $param;
    public $nama_pelatihan, $jenis_pelatihan, $pelatihan_skill, $total_jam;
    public $keterangan;
    public $aktif;
    public $subpelatihan, $limit_akses, $total_bobot, $kelulusan, $pretes, $postes, $materi;
    public $total_materi, $total_soal, $total_user;
    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function render()
    {
        $data = Pelatihan::find($this->param);
        $this->nama_pelatihan = $data->nama_pelatihan;
        $this->jenis_pelatihan = $data->kelas_jenis->nama_kelas_jenis;
        $this->pelatihan_skill = $data->kelas_skill->nama_kelas_skill;
        $this->total_jam = $data->total_jam;
        $this->keterangan = $data->keterangan;
        $this->subpelatihan = $data->subpelatihan;
        $this->limit_akses = $data->limit_akses;
        $this->total_bobot = $data->total_bobot;
        $this->kelulusan = $data->kelulusan;
        $this->pretes = $data->pretes;
        $this->materi = $data->materi;
        $this->postes = $data->postes;

        $pelatihan_jenis = Kelas_jenis::where('aktif', 'Y')->get();
        $pelatihan_skill = Kelas_skill::where('aktif', 'Y')->get();

        $this->total_materi = Pelatihan_materi::where('pelatihan_id', $this->param)->count();
        $this->total_soal = Pelatihan_soal::where('pelatihan_id', $this->param)->count();
        $this->total_user = Pelatihan_user::where('pelatihan_id', $this->param)->count();

        return view('livewire.admin.pelatihan.pelatihan-lanjut', [
            "pelatihan_jenis" => $pelatihan_jenis,
            "pelatihan_skill" => $pelatihan_skill,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}