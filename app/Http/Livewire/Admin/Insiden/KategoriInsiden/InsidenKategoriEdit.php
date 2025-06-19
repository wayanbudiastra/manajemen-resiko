<?php

namespace App\Http\Livewire\Admin\Insiden\KategoriInsiden;

use App\Models\Insiden\Insiden_kategori;
use Exception;
use Livewire\Component;

class InsidenKategoriEdit extends Component
{
    public $param;
    public $nama_insiden_kategori = '';

    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-insiden-kategori');
    }

    public function store()
    {
        $this->validate([
            'nama_insiden_kategori' => 'required',
        ]);

        try {
            $data = Insiden_kategori::find($this->param);
            $data->update([
                "nama_insiden_kategori" => $this->nama_insiden_kategori,
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
            $data = Insiden_kategori::find($this->param);
            $this->nama_insiden_kategori = $data->nama_insiden_kategori;
            $this->aktif = $data->aktif;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $data = [];
        }
        return view('livewire.admin.insiden.kategori-insiden.insiden-kategori-edit', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}
