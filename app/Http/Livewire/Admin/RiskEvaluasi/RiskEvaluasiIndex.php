<?php

namespace App\Http\Livewire\Admin\RiskEvaluasi;

use App\Models\Risk\Risk_evaluasi;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class RiskEvaluasiIndex extends Component
{
public $modeAdd = false;
    public $src = '';
    public $nama_evaluasi = '';
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
                'nama_evaluasi' => 'required', 
            ]);

            Risk_evaluasi::create([
                "nama_evaluasi" => $this->nama_evaluasi,
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
        return redirect()->to('admin-resiko-evaluasi-edit/' . $id);
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
        $data = Risk_evaluasi::paginate(10);
       //dd($data);
        if (strlen($this->src) > 1) {
            $data = Risk_evaluasi::where("nama_evaluasi", "like", "%{$this->src}%")->paginate(10);
        //dd($this->src);
        }

        return view('livewire.admin.risk-evaluasi.risk-evaluasi-index', [
            'no' => 1,
            'data' => $data,
        
        ])->layout('layouts.main-admin');
    }

   
}
