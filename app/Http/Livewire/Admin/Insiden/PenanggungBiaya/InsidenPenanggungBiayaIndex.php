<?php

namespace App\Http\Livewire\Admin\Insiden\PenanggungBiaya;

use App\Models\Insiden\Insiden_penanggung_biaya;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenPenanggungBiayaIndex extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_insiden_penanggung_biaya = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        $this->validate([
            'nama_insiden_penanggung_biaya' => 'required',
        ]);
        try {
            $data = Insiden_penanggung_biaya::create([
                "nama_insiden_penanggung_biaya" => $this->nama_insiden_penanggung_biaya,
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
        return redirect()->to('admin-insiden-penanggung-biaya-edit/' . $id);
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
        $data = Insiden_penanggung_biaya::paginate(10);


        if (strlen($this->src) > 1) {
            $data = Insiden_penanggung_biaya::where("nama_insiden_penanggung_biaya", "like", "%{$this->src}%")->paginate(10);
            //dd($this->src);
        }
        return view('livewire.admin.insiden.penanggung-biaya.insiden-penanggung-biaya-index', [
            'no' => 1,
            'data' => $data,
        ])->layout('layouts.main-admin');
    }
}
