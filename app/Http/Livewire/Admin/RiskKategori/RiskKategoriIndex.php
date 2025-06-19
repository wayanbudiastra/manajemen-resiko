<?php

namespace App\Http\Livewire\Admin\RiskKategori;

use App\Models\Risk\Risk_kategori;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class RiskKategoriIndex extends Component
{

    public $modeAdd = false;
    public $src = '';
    public $nama_kategori = '';
    public $keterangan = '';
   
    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        try {
            $this->validate([
                'nama_kategori' => 'required',
               
            ]);

            Risk_kategori::create([
                "nama_kategori" => $this->nama_kategori,
                "keterangan" => $this->keterangan
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function edit($id)
    {
        return redirect()->to('admin-resiko-kategori-edit/' . $id);
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
        $data = Risk_kategori::paginate(10);
       //dd($data);
        if (strlen($this->src) > 1) {
            $data = Risk_kategori::where("nama_kategori", "like", "%{$this->src}%")->paginate(10);
        //dd($this->src);
        }

        return view('livewire.admin.risk-kategori.risk-kategori-index', [
            'no' => 1,
            'data' => $data,
        
        ])->layout('layouts.main-admin');
    }
   
}
