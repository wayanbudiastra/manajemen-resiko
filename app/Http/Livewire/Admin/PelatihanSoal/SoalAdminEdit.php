<?php

namespace App\Http\Livewire\Admin\PelatihanSoal;

use App\Models\Admin\Pelatihan_soal;
use Exception;
use Livewire\Component;

class SoalAdminEdit extends Component
{
    public $param, $pelatihan_id;

    public $pertanyaan, $jawaban_a, $jawaban_b, $jawaban_c, $jawaban_d, $kunci_jawaban, $bobot;


    public function mount($param = null)
    {
        $this->param = $param;
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
            $data = Pelatihan_soal::find($this->param);
            $data->update([
                "pertanyaan" => $this->pertanyaan,
                "jawaban_a" => $this->jawaban_a,
                "jawaban_b" => $this->jawaban_b,
                "jawaban_c" => $this->jawaban_c,
                "jawaban_d" => $this->jawaban_d,
                "kunci_jawaban" => $this->kunci_jawaban,
                "bobot" => $this->bobot,
                "aktif" => $this->aktif,
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
        return redirect()->to('admin-soal-index/' . $this->pelatihan_id);
    }

    public function render()
    {
        $data = Pelatihan_soal::find($this->param);
        $this->pelatihan_id = $data->pelatihan_id;
        $this->pertanyaan = $data->pertanyaan;
        $this->jawaban_a = $data->jawaban_a;
        $this->jawaban_b = $data->jawaban_b;
        $this->jawaban_c = $data->jawaban_c;
        $this->jawaban_d = $data->jawaban_d;
        $this->kunci_jawaban = $data->kunci_jawaban;
        $this->bobot = $data->bobot;
        $this->aktif = $data->aktif;
        return view('livewire.admin.pelatihan-soal.soal-admin-edit')->layout('layouts.main-admin');
    }
}