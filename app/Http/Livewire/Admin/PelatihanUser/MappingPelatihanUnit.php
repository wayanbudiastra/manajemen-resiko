<?php

namespace App\Http\Livewire\Admin\PelatihanUser;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_unit;
use App\Models\Admin\Pelatihan_user;
use App\Models\Master_v1\Unit;
use App\Models\User;
use Exception;
use Livewire\Component;

class MappingPelatihanUnit extends Component
{
    public $selectedUnit = [];

    public $selectAll = false;

    public $param;

    public $modeAdd = false;

    public function mount($param = null)
    {
        $this->param = $param;
        $this->selectedUnit = collect();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedUnit = Unit::pluck('id');
        } else {
            $this->selectedUnit = [];
        }
    }

    public function store()
    {
        try {
            $insert_unit = [];
            $insert_user = [];
            foreach ($this->selectedUnit as $key => $data) {
                $cek_maaping_unit = Pelatihan_unit::where('unit_id', $data)->where('pelatihan_id', $this->param)->count();
                //cek supaya tidak terjadi double mapping unit
                if ($cek_maaping_unit == 0) {
                    $user_map = User::where('unit_id', $data)->get();
                    array_push($insert_unit, ['unit_id' => $data, 'pelatihan_id' => $this->param]);
                    foreach ($user_map as $users) {
                        $cek_maaping = Pelatihan_user::where('user_id', $users->id)->where('pelatihan_id', $this->param)->count();
                        //cek supaya tidak terjadi double mapping
                        if ($cek_maaping == 0) {
                            array_push($insert_user, ['pelatihan_id' => $this->param, 'user_id' => $users->id]);
                        }
                    }
                }
            }
            Pelatihan_unit::insert($insert_unit);
            Pelatihan_user::insert($insert_user);
            session()->flash('success', 'Data Berhasil di ditambahkan..');
            $this->kembali();
            //dd($insert_unit);
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
        $unit = Unit::where('aktif','Y')->whereDoesntHave('pelatihan_unit', function ($query) {
            return $query->where('pelatihan_id', $this->param);
        })->get(); // data user yang belum di maping 

        return view('livewire.admin.pelatihan-user.mapping-pelatihan-unit', [
            "no" => 1,
            "data" => $unit
        ])->layout('layouts.main-admin');
    }
}