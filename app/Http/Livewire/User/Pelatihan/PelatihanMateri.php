<?php

namespace App\Http\Livewire\User\Pelatihan;

use App\Models\Admin\Pelatihan_materi;
use App\Models\Admin\Pelatihan_user;
use App\Models\Admin\Pelatihan_user_log_materi;
use Exception;
use Livewire\Component;

class PelatihanMateri extends Component
{
    public $param;
    public $materiPdf = false;
    public $materiVideo = false;
    public $data_materi;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function materiPdf($id)
    {

        // dd($this->materiPdf);
        try {
            $materi = Pelatihan_materi::find($id);

            //simpan log akses limit user
            $data = Pelatihan_user_log_materi::create([
                "pelatihan_user_id" => $this->param,
                "pelatihan_materi_id" => $materi->id,
                "no_limit" => get_limit_materi($id, $this->param) + 1,
                "keterangan" => "akses Materi ke " . get_limit_materi($id, $this->param) + 1
            ]);

            $this->data_materi = $materi;
            $this->materiPdf = true;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function materiVideo($id)
    {
        try {
            $materi = Pelatihan_materi::find($id);

            //simpan log akses limit user
            Pelatihan_user_log_materi::create([
                "pelatihan_user_id" => $this->param,
                "pelatihan_materi_id" => $materi->id,
                "no_limit" => get_limit_materi($id, $this->param) + 1,
                "keterangan" => "akses Materi ke " . get_limit_materi($id, $this->param) + 1
            ]);
            $this->data_materi = $materi;
            $this->materiVideo = true;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        //dd($this->materiVideo);
    }
    public function goback()
    {
        $this->materiVideo = false;
        $this->materiPdf = false;
        //$this->data_materi = '';
    }

    public function kembali()
    {
        return redirect()->to('pelatihan-user-detail/' . $this->param);
    }

    public function render()
    {
        //dd($this->param);
        $data = Pelatihan_user::find($this->param);
        $materi = Pelatihan_materi::where('pelatihan_id', $data->pelatihan_id)->where('aktif', 'Y')->get();

        $this->nama_pelatihan = $data->pelatihan->nama_pelatihan;
        $this->jenis_pelatihan = $data->pelatihan->kelas_jenis->nama_kelas_jenis;
        $this->pelatihan_skill = $data->pelatihan->kelas_skill->nama_kelas_skill;
        $this->total_jam = $data->pelatihan->total_jam;
        $this->keterangan = $data->pelatihan->keterangan;
        $this->subpelatihan = $data->pelatihan->subpelatihan;
        $this->limit_akses = $data->pelatihan->limit_akses;
        $this->total_bobot = $data->pelatihan->total_bobot;
        $this->kelulusan = $data->pelatihan->kelulusan;

        return view('livewire.user.pelatihan.pelatihan-materi', [
            "data" => $data,
            "materi" => $materi,
            "no" => 1
        ])->layout('layouts.main');
    }
}