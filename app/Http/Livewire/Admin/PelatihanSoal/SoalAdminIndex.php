<?php

namespace App\Http\Livewire\Admin\PelatihanSoal;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_soal;
use Exception;
use Livewire\Component;

class SoalAdminIndex extends Component
{
    public $param;
    public $pertanyaan, $jawaban_a, $jawaban_b, $jawaban_c, $jawaban_d, $kunci_jawaban, $bobot;
    public $modeAdd = false;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function add()
    {
        $this->pertanyaan = "";
        $this->jawaban_a = "";
        $this->jawaban_b = "";
        $this->jawaban_c = "";
        $this->jawaban_d = "";
        $this->kunci_jawaban = "";
        $this->bobot = "";
        $this->modeAdd = true;
    }
    public function store()
    {
        $this->validate([
            'pertanyaan' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
            'kunci_jawaban' => 'required',
            'bobot' => 'required',
        ]);

        try {
            $data = Pelatihan_soal::create([
                "pelatihan_id" => $this->param,
                "pertanyaan" => $this->pertanyaan,
                "jawaban_a" => $this->jawaban_a,
                "jawaban_b" => $this->jawaban_b,
                "jawaban_c" => $this->jawaban_c,
                "jawaban_d" => $this->jawaban_d,
                "kunci_jawaban" => $this->kunci_jawaban,
                "bobot" => $this->bobot,
            ]);
            $this->modeAdd = false;
            session()->flash('success', 'Data Berhasil di tambahkan..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function kembali()
    {
        $this->modeAdd = false;
    }

    public function edit($id)
    {
        return redirect()->to('admin-soal-edit/' . $id);
    }

    public function delete($id)
    {
        try {
            $data = Pelatihan_soal::find($id);
            $data->delete();
            session()->flash('success', 'Data Berhasil di hapus..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
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
        $this->realisasi_bobot = Pelatihan_soal::where('pelatihan_id', $this->param)->where('aktif', 'Y')->sum('bobot');
        $soal = Pelatihan_soal::where('pelatihan_id', $this->param)->get();
        return view('livewire.admin.pelatihan-soal.soal-admin-index', [
            "soal" => $soal,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}