<?php

namespace App\Http\Livewire\Admin\Insiden\Ruangan;

use App\Models\Insiden\Insiden_ruangan;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenRuanganIndex extends Component
{

    public $modeAdd = false;
    public $src = '';
    public $nama_insiden_ruangan = '';
    public $portal_kabid_id = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        $this->validate([
            'nama_insiden_ruangan' => 'required',
        ]);
        try {
            $data = Insiden_ruangan::create([
                "nama_insiden_ruangan" => $this->nama_insiden_ruangan,
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
        return redirect()->to('admin-insiden-ruangan-edit/' . $id);
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

        $data = Insiden_ruangan::paginate(10);


        if (strlen($this->src) > 1) {
            $data = Insiden_ruangan::where("nama_insiden_ruangan", "like", "%{$this->src}%")->paginate(10);
            //dd($this->src);
        }
        return view('livewire.admin.insiden.ruangan.insiden-ruangan-index', [
            'no' => 1,
            'data' => $data,
        ])->layout('layouts.main-admin');
    }
}
