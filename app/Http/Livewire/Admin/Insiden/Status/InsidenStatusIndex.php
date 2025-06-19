<?php

namespace App\Http\Livewire\Admin\Insiden\Status;

use App\Models\Insiden\Insiden_status;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenStatusIndex extends Component
{

    public $modeAdd = false;
    public $src = '';
    public $nama_insiden_status = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        $this->validate([
            'nama_insiden_status' => 'required',
        ]);
        try {
            $data = Insiden_status::create([
                "nama_insiden_status" => $this->nama_insiden_status,
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
        return redirect()->to('admin-insiden-status-edit/' . $id);
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
        $data = Insiden_status::paginate(10);


        if (strlen($this->src) > 1) {
            $data = Insiden_status::where("nama_insiden_status", "like", "%{$this->src}%")->paginate(10);
            //dd($this->src);
        }
        return view('livewire.admin.insiden.status.insiden-status-index', [
            'no' => 1,
            'data' => $data,
        ])->layout('layouts.main-admin');
    }
}
