<?php

namespace App\Http\Livewire\Admin\Insiden\Unit;

use App\Models\Insiden\Insiden_unit;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenUnitIndex extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_insiden_unit = '';
    public $portal_kabid_id = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        $this->validate([
            'nama_insiden_unit' => 'required',
        ]);

        try {

            $data = Insiden_unit::create([
                "nama_insiden_unit" => $this->nama_insiden_unit,
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
        return redirect()->to('admin-insiden-unit-edit/' . $id);
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
        $data = Insiden_unit::paginate(10);


        if (strlen($this->src) > 1) {
            $data = Insiden_unit::where("nama_insiden_unit", "like", "%{$this->src}%")->paginate(10);
            //dd($this->src);
        }

        return view('livewire.admin.insiden.unit.insiden-unit-index', [
            'no' => 1,
            'data' => $data,
        ])->layout('layouts.main-admin');
    }
}
