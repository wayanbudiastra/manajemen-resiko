<?php

namespace App\Http\Livewire\Admin\Insiden\Jenis;

use App\Models\Insiden\Insiden_jenis;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenJenisIndex extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_insiden_jenis = '';
    public $keterangan = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        $this->validate([
            'nama_insiden_jenis' => 'required',
            'keterangan' => 'required',
        ]);

        try {

            $data = Insiden_jenis::create([
                "nama_insiden_jenis" => $this->nama_insiden_jenis,
                "keterangan" => $this->keterangan,
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
        return redirect()->to('admin-insiden-jenis-edit/' . $id);
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
        $data = Insiden_jenis::paginate(10);


        if (strlen($this->src) > 1) {
            $data = Insiden_jenis::where("nama_insiden_jenis", "like", "%{$this->src}%")->paginate(10);
            //dd($this->src);
        }

        return view('livewire.admin.insiden.jenis.insiden-jenis-index', [
            'no' => 1,
            'data' => $data,
        ])->layout('layouts.main-admin');
    }
}
