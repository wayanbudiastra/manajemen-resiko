<?php

namespace App\Http\Livewire\Admin\RiskEvaluasi;


use App\Models\Risk\Risk_evaluasi;
use Exception;
use Livewire\Component;

class RiskEvaluasiUpdate extends Component
{
    public $param;
    public $modeAdd = false;
    public $src = '';
    public $nama_evaluasi = '';
    public $keterangan = '';
    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-resiko-evaluasi');
    }

    public function store()
    {
        try {
            $this->validate([
                'nama_evaluasi' => 'required',          
            ]);
            $data = Risk_evaluasi::find($this->param);
            $data->update([
                "nama_evaluasi" => $this->nama_evaluasi,
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
            $data = Risk_evaluasi::find($this->param);
            $this->nama_evaluasi = $data->nama_evaluasi;
            $this->keterangan = $data->keterangan;
            $this->aktif = $data->aktif;
           
            session()->flash('success', 'Data Berhasil di simpan..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.risk-evaluasi.risk-evaluasi-update', [
            
        ])->layout('layouts.main-admin');
    }
    
}
