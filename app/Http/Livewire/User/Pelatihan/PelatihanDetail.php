<?php

namespace App\Http\Livewire\User\Pelatihan;

use App\Models\Admin\Pelatihan_sertifikat;
use App\Models\Admin\Pelatihan_user;
use App\Models\Admin\Pelatihan_user_log;
use App\Models\Admin\Pelatihan_user_sertifikat;
use Exception;
use Livewire\Component;

class PelatihanDetail extends Component
{
    public $param;
    public $status_materi, $status_pretes, $status_postes;
    public $count_sertifikat = 0;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('/pelatihan-user');
    }

    public function pretes($id)
    {
        return redirect()->to('/pelatihan-user-pretes/' . $id);
    }

    public function materi($id)
    {
        return redirect()->to('/pelatihan-user-materi/' . $id);
    }

    public function postes($id)
    {
        return redirect()->to('/pelatihan-user-postes/' . $id);
    }

    public function generate_sertifikat($id)
    {
        try {
            $data_sertifikat = Pelatihan_sertifikat::where('pelatihan_id', $this->pelatihan_id)->first();
            $user_sertifikat = Pelatihan_user_sertifikat::create([
                "pelatihan_user_id" => $this->param,
                "nama_user" => auth()->user()->first_name . ' ' . auth()->user()->last_name,
                "lokasi" =>  $this->nama_pelatihan,
                "lokasi_x" => $data_sertifikat->lokasi_x,
                "lokasi_y" => $data_sertifikat->lokasi_y,
                "acc1" => $data_sertifikat->acc1,
                "acc1_x" => $data_sertifikat->acc1_x,
                "acc1_y" => $data_sertifikat->acc1_y,
                "acc2" => $data_sertifikat->acc2,
                "acc2_x" => $data_sertifikat->acc2_x,
                "acc2_y" => $data_sertifikat->acc2_y,
                "photo" => $data_sertifikat->photo,
            ]);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function edit_sertifikat($id)
    {
        return redirect()->to('/pelatihan-user-sertifikat-edit/' . $id);
    }
    public function view_sertifikat($id)
    {
        dd("view sertifikat");
    }

    public function render()
    {
        $data = Pelatihan_user::find($this->param);
        //cek status kegiatan
        $this->status_materi = $data->pelatihan->materi;
        $this->status_pretes = $data->pelatihan->pretes;
        $this->status_postes = $data->pelatihan->postes;
        $this->status_sertifikat = $data->pelatihan->sertifikat;
        // saat ini di buat satu log pelatihan user hanya bisa 1 sertifikat
        $this->count_sertifikat = Pelatihan_user_sertifikat::where('pelatihan_user_id', $this->param)->count();
        //dd($this->status_postes);
        // cek jumlah log per kegiatan
        //1 kegiatan pretes
        //2 kegiatan materi
        //3 kegiatan postes
        $this->log_pretes = Pelatihan_user_log::where('pelatihan_user_id', $data->id)->where('kegiatan_id', '1')->count();
        $this->log_materi = Pelatihan_user_log::where('pelatihan_user_id', $data->id)->where('kegiatan_id', '2')->count();
        $this->log_postes = Pelatihan_user_log::where('pelatihan_user_id', $data->id)->where('kegiatan_id', '3')->count();

        $this->pelatihan_id = $data->pelatihan->id;
        $this->nama_pelatihan = $data->pelatihan->nama_pelatihan;
        $this->jenis_pelatihan = $data->pelatihan->kelas_jenis->nama_kelas_jenis;
        $this->pelatihan_skill = $data->pelatihan->kelas_skill->nama_kelas_skill;
        $this->total_jam = $data->pelatihan->total_jam;
        $this->keterangan = $data->pelatihan->keterangan;
        $this->subpelatihan = $data->pelatihan->subpelatihan;
        $this->limit_akses = $data->pelatihan->limit_akses;
        $this->total_bobot = $data->pelatihan->total_bobot;
        $this->kelulusan = $data->pelatihan->kelulusan;
        $this->status_lulus = $data->kelulusan;


        return view('livewire.user.pelatihan.pelatihan-detail', [
            "data" => $data
        ])->layout('layouts.main');
    }
}