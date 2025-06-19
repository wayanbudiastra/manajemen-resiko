<?php

namespace App\Http\Livewire\Admin\Pelatihan;

use App\Models\Admin\Pelatihan;
use App\Models\Master_v1\Kelas_jenis;
use App\Models\Master_v1\Kelas_skill;
use Exception;
use Livewire\Component;

class PelatihanEdit extends Component
{
    public $param;
    public $nama_pelatihan, $pelatihan_jenis_id, $pelatihan_skill_id, $total_jam;
    public $keterangan;
    public $aktif;
    public $subpelatihan, $limit_akses, $total_bobot, $kelulusan, $pretes, $postes, $materi;

    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function store()
    {
        $this->validate([
            'nama_pelatihan' => 'required',
            'pelatihan_jenis_id' => 'required',
            'pelatihan_skill_id' => 'required',
            'total_jam' => 'required',
            'limit_akses' => 'required',
            'total_bobot' => 'required',
            'kelulusan' => 'required',
            'pretes' => 'required',
        ]);

        try {
            $data = Pelatihan::find($this->param);
            $data->update([
                "nama_pelatihan" => $this->nama_pelatihan,
                "pelatihan_jenis_id" => $this->pelatihan_jenis_id,
                "pelatihan_skill_id" => $this->pelatihan_skill_id,
                "total_jam" => $this->total_jam,
                "keterangan" => $this->keterangan,
                "subpelatihan" => $this->subpelatihan,
                "limit_akses" => $this->limit_akses,
                "total_bobot" => $this->total_bobot,
                "kelulusan" => $this->kelulusan,
                "pretes" => $this->pretes,
                "materi" => $this->materi,
                "postes" => $this->postes,
                "sertifikat" => $this->sertifikat,
                "random_soal" => $this->random_soal,
            ]);
            session()->flash('success', 'Data Berhasil di update..');
            // dd($data);
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function kembali()
    {
        return redirect()->to('/admin-pelatihan-index');
    }
    public function render()
    {
        $data = Pelatihan::find($this->param);
        $this->nama_pelatihan = $data->nama_pelatihan;
        $this->pelatihan_jenis_id = $data->pelatihan_jenis_id;
        $this->pelatihan_skill_id = $data->pelatihan_skill_id;
        $this->total_jam = $data->total_jam;
        $this->keterangan = $data->keterangan;
        $this->subpelatihan = $data->subpelatihan;
        $this->limit_akses = $data->limit_akses;
        $this->total_bobot = $data->total_bobot;
        $this->kelulusan = $data->kelulusan;
        $this->pretes = $data->pretes;
        $this->materi = $data->materi;
        $this->postes = $data->postes;
        $this->random_soal = $data->random_soal;
        $this->sertifikat = $data->sertifikat;
        $pelatihan_jenis = Kelas_jenis::where('aktif', 'Y')->get();
        $pelatihan_skill = Kelas_skill::where('aktif', 'Y')->get();
        return view('livewire.admin.pelatihan.pelatihan-edit', [
            "pelatihan_jenis" => $pelatihan_jenis,
            "pelatihan_skill" => $pelatihan_skill,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}