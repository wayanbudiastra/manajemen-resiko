<?php

namespace App\Http\Livewire\Admin\Insiden\KategoriInsiden;

use App\Models\Insiden\Insiden_kategori;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenKategoriIndex extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_insiden_kategori = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        $this->validate([
            'nama_insiden_kategori' => 'required',
        ]);
        try {
            $data = Insiden_kategori::create([
                "nama_insiden_kategori" => $this->nama_insiden_kategori,
                "aktif" => "Y"
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function edit($id)
    {
        return redirect()->to('admin-insiden-kategori-edit/' . $id);
    }

    public function kembali()
    {
        $this->modeAdd = false;
        $this->resetPage();
    }

    public function add()
    {
        $this->modeAdd = true;
    }
    public function render()
    {
        $data = Insiden_kategori::paginate(10);


        if (strlen($this->src) > 1) {
            $data = Insiden_kategori::where("nama_insiden_kategori", "like", "%{$this->src}%")->paginate(10);
            //dd($this->src);
        }
        return view('livewire.admin.insiden.kategori-insiden.insiden-kategori-index', [
            'no' => 1,
            'data' => $data,
        ])->layout('layouts.main-admin');
    }
}
