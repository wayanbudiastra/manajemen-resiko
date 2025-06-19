<?php

namespace App\Http\Livewire\Admin\PelatihanUser;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_user;
use App\Models\User;
use Exception;
use Livewire\Component;

class MappingPelatihanUser extends Component
{
    public $selectedUser = [];

    public $selectAll = false;

    public $param;

    public $modeAdd = false;

    public function mount($param = null)
    {
        $this->param = $param;
        $this->selectedUser = collect();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedUser = User::pluck('id');
        } else {
            $this->selectedUser = [];
        }
    }

    public function store()
    {
        try {
            $insert_user = [];
            foreach ($this->selectedUser as $key => $data) {
                $cek_maaping = Pelatihan_user::where('user_id', $data)->where('pelatihan_id', $this->param)->count();
                //cek supaya tidak terjadi double mapping
                if ($cek_maaping == 0) {
                    array_push($insert_user, ['pelatihan_id' => $this->param, 'user_id' => $data]);
                }
            }
            Pelatihan_user::insert($insert_user);
            session()->flash('success', 'Data Berhasil di ditambahkan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }

    public function kembali()
    {
        return redirect()->to('/admin-mapping-index/' . $this->param);
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

        //$pelatihan_i$this->param;
        $data_user = User::whereDoesntHave('pelatihan_user', function ($query) {
            return $query->where('pelatihan_id', $this->param);
        })->get(); // data user yang belum di maping 

        // dd($data_user);
        return view('livewire.admin.pelatihan-user.mapping-pelatihan-user', [
            "no" => 1,
            "data" => $data_user
        ])->layout('layouts.main-admin');
    }
}