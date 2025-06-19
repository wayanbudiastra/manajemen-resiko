<?php

namespace App\Http\Livewire\Admin\Pelatihan;

use App\Models\Admin\Pelatihan;
use App\Models\Master_v1\Kelas_jenis;
use App\Models\Master_v1\Kelas_skill;
use Exception;
use Livewire\Component;

class PelatihanMaster extends Component
{
    public $search = '';
    public $Id;
    public $nama_pelatihan, $pelatihan_jenis_id, $pelatihan_skill_id, $total_jam;
    public $keterangan;
    public $aktif;
    public $subpelatihan, $limit_akses, $total_bobot, $kelulusan, $pretes, $postes, $materi, $random_soal, $sertifikat;
    public $modeAdd = false;

    public function add()
    {
        $this->nama_pelatihan = "";
        $this->pelatihan_jenis_id = "";
        $this->pelatihan_skill_id = "";
        $this->total_jam = "1";
        $this->keterangan = "";
        $this->subpelatihan = "N";
        $this->limit_akses = "";
        $this->total_bobot = "";
        $this->materi = "Y";
        $this->postes = "Y";
        $this->kelulusan = "";
        $this->pretes = "Y";
        $this->random_soal = "Y";
        $this->sertifikat = "Y";
        $this->modeAdd = true;
    }

    public function aktifkan($id)
    {
        try {
            $pelatihan = Pelatihan::find($id);
            $pelatihan->update([
                "aktif" => "Y"
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function nonaktifkan($id)
    {
        try {
            $pelatihan = Pelatihan::find($id);
            $pelatihan->update([
                "aktif" => "N"
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
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
            $data = Pelatihan::create([

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
                "users_id" => auth()->user()->id,
            ]);
            $this->modeAdd = false;
            session()->flash('success', 'Data Berhasil di tambahkan..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function lanjut($id)
    {
        return redirect()->to('/admin-pelatihan-lanjut/' . $id);
    }
    public function edit($id)
    {
        return redirect()->to('/admin-pelatihan-edit/' . $id);
    }


    public function kembali()
    {
        $this->modeAdd = false;
    }


    public function render()
    {
        $data = Pelatihan::where('users_id', auth()->user()->id)->orderby('id', 'desc')->limit(50)->paginate(10);
        $pelatihan_jenis = Kelas_jenis::where('aktif', 'Y')->get();
        $pelatihan_skill = Kelas_skill::where('aktif', 'Y')->get();
        return view('livewire.admin.pelatihan.pelatihan-master', [
            "data" => $data,
            "pelatihan_jenis" => $pelatihan_jenis,
            "pelatihan_skill" => $pelatihan_skill,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}