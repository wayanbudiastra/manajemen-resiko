<?php

namespace App\Http\Livewire\Admin\Insiden\Unit;

use App\Models\Insiden\Insiden_unit;
use Exception;
use Livewire\Component;

class InsidenUnitEdit extends Component
{
    public $param;
    public $nama_insiden_unit = '';

    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-insiden-unit');
    }

    public function store()
    {
        $this->validate([
            'nama_insiden_unit' => 'required',
        ]);

        try {
            $data = Insiden_unit::find($this->param);
            $data->update([
                "nama_insiden_unit" => $this->nama_insiden_unit,
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
            $data = Insiden_unit::find($this->param);
            $this->nama_insiden_unit = $data->nama_insiden_unit;
            $this->aktif = $data->aktif;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $data = [];
        }
        return view('livewire.admin.insiden.unit.insiden-unit-edit', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}
