<?php

namespace App\Http\Livewire\Admin\Setting\PortalUnit;

use App\Models\Admin\Portal_kabid;
use App\Models\Admin\Portal_unit;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class PortalUnitIndex extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_unit = '';
    public $portal_kabid_id = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        try {
            $this->validate([
                'nama_unit' => 'required',
                'portal_kabid_id' => 'required',

            ]);

            $pelatihan = Portal_unit::create([
                "nama_unit" => $this->nama_unit,
                "portal_kabid_id" => $this->portal_kabid_id
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function edit($id)
    {
        return redirect()->to('admin-portal-unit-edit/' . $id);
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
        $data = Portal_unit::paginate(10);
        $kabid = Portal_kabid::where('aktif', 'Y')->get();

        if (strlen($this->src) > 1) {
            $data = Portal_unit::where("nama_unit", "like", "%{$this->src}%")->paginate(10);
        //dd($this->src);
        }

        return view('livewire.admin.setting.portal-unit.portal-unit-index', [
            'no' => 1,
            'data' => $data,
            'kabid' => $kabid
        ])->layout('layouts.main-admin');
    }
}