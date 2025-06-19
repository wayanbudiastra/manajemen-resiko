<?php

namespace App\Http\Livewire\Admin\Insiden\PenanggungBiaya;

use App\Models\Insiden\Insiden_penanggung_biaya;
use Exception;
use Livewire\Component;

class InsidenPenanggungBiayaEdit extends Component
{
    public $param;
    public $nama_insiden_penanggung_biaya = '';

    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-insiden-penannggung-biaya');
    }

    public function store()
    {
        $this->validate([
            'nama_insiden_penanggung_biaya' => 'required',
        ]);

        try {
            $data = Insiden_penanggung_biaya::find($this->param);
            $data->update([
                "nama_insiden_penanggung_biaya" => $this->nama_insiden_penanggung_biaya,
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
            $data = Insiden_penanggung_biaya::find($this->param);
            $this->nama_insiden_penanggung_biaya = $data->nama_insiden_penanggung_biaya;
            $this->aktif = $data->aktif;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $data = [];
        }
        return view('livewire.admin.insiden.penanggung-biaya.insiden-penanggung-biaya-edit', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}
