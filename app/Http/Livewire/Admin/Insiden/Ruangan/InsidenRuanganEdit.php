<?php

namespace App\Http\Livewire\Admin\Insiden\Ruangan;

use App\Models\Insiden\Insiden_ruangan;
use Exception;
use Livewire\Component;

class InsidenRuanganEdit extends Component
{
    public $param;
    public $nama_insiden_ruangan = '';

    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-insiden-ruangan');
    }

    public function store()
    {
        $this->validate([
            'nama_insiden_ruangan' => 'required',
        ]);

        try {
            $data = Insiden_ruangan::find($this->param);
            $data->update([
                "nama_insiden_ruangan" => $this->nama_insiden_ruangan,
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
            $data = Insiden_ruangan::find($this->param);
            $this->nama_insiden_ruangan = $data->nama_insiden_ruangan;
            $this->aktif = $data->aktif;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $data = [];
        }
        return view('livewire.admin.insiden.ruangan.insiden-ruangan-edit', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}
