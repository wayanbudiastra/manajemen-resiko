<?php

namespace App\Http\Livewire\Admin\RiskKategori;


use App\Models\Risk\Risk_kategori;
use Exception;
use Livewire\Component;

class RiskKategoriUpdate extends Component
{
    public $param;
    public $modeAdd = false;
    public $src = '';
    public $nama_kategori = '';
    public $keterangan = '';
    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-resiko-kategori');
    }

    public function store()
    {
        try {
            $this->validate([
                'nama_kategori' => 'required',
                
            ]);
            $data = Risk_kategori::find($this->param);
            $data->update([
                "nama_kategori" => $this->nama_kategori,
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
            $data = Risk_kategori::find($this->param);
            $this->nama_kategori = $data->nama_kategori;
            $this->keterangan = $data->keterangan;
            $this->aktif = $data->aktif;
           
            session()->flash('success', 'Data Berhasil di simpan..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.risk-kategori.risk-kategori-update', [
            
        ])->layout('layouts.main-admin');
    }
 
}
