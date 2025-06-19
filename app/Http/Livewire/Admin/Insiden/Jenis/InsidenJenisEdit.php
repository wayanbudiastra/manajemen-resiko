<?php

namespace App\Http\Livewire\Admin\Insiden\Jenis;

use App\Models\Insiden\Insiden_jenis;
use Exception;
use Livewire\Component;

class InsidenJenisEdit extends Component
{
    public $param;
    public $nama_insiden_jenis = '';
    public $keterangan = '';

    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-insiden-jenis');
    }

    public function store()
    {
        $this->validate([
            'nama_insiden_jenis' => 'required',
            'keterangan' => 'required',
        ]);

        try {
            $data = Insiden_jenis::find($this->param);
            $data->update([
                "nama_insiden_jenis" => $this->nama_insiden_jenis,
                "keterangan" => $this->keterangan,
                "aktif" => $this->aktif
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }

    public function render()
    {
        try {
            $data = Insiden_jenis::find($this->param);
            $this->nama_insiden_jenis = $data->nama_insiden_jenis;
            $this->keterangan = $data->keterangan;
            $this->aktif = $data->aktif;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $data = [];
        }
        return view('livewire.admin.insiden.jenis.insiden-jenis-edit', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}
