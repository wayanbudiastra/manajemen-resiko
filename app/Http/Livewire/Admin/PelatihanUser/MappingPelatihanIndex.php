<?php

namespace App\Http\Livewire\Admin\PelatihanUser;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_user;
use App\Models\User;
use Exception;
use Livewire\Component;

class MappingPelatihanIndex extends Component
{

    public $param;
    public $modeAdd = false;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function user($id)
    {
        return redirect()->to('/admin-mapping-user/' . $id);
    }

    public function unit($id)
    {
        return redirect()->to('/admin-mapping-unit/' . $id);
    }

    public function hapus($id)
    {
        try {
            $data = Pelatihan_user::find($id);
            $data->delete();
            session()->flash('success', 'Data Berhasil di hapus..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function kembali($id)
    {
        return redirect()->to('/admin-pelatihan-lanjut/' . $id);
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
        $data_mapping = Pelatihan_user::where('pelatihan_id', $this->param)->get();
        $data_user = User::whereDoesntHave('pelatihan_user', function ($query) {
            return $query->where('pelatihan_id', $this->param);
        })->get(); // data user yang belum di maping 

        return view('livewire.admin.pelatihan-user.mapping-pelatihan-index', [
            "data" => $data_mapping,
            "data_user" => $data_user,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}