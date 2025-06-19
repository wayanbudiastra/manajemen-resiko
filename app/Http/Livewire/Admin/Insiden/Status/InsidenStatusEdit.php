<?php

namespace App\Http\Livewire\Admin\Insiden\Status;

use App\Models\Insiden\Insiden_status;
use Exception;
use Livewire\Component;

class InsidenStatusEdit extends Component
{
    public $param;
    public $nama_insiden_status = '';

    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-insiden-status');
    }

    public function store()
    {
        $this->validate([
            'nama_insiden_status' => 'required',
        ]);

        try {
            $data = Insiden_status::find($this->param);
            $data->update([
                "nama_insiden_status" => $this->nama_insiden_status,
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
            $data = Insiden_status::find($this->param);
            $this->nama_insiden_status = $data->nama_insiden_status;
            $this->aktif = $data->aktif;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $data = [];
        }
        return view('livewire.admin.insiden.status.insiden-status-edit', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}
