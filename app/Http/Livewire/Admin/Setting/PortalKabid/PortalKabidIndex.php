<?php

namespace App\Http\Livewire\Admin\Setting\PortalKabid;

use App\Models\Admin\Portal_kabid;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class PortalKabidIndex extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_kabid = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }


    public function store()
    {
        try {
            $this->validate([
                'nama_kabid' => 'required',
            ]);

            $pelatihan = Portal_kabid::create([
                "nama_kabid" => $this->nama_kabid,
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function edit($id)
    {
        return redirect()->to('admin-portal-kabid-edit/' . $id);
    }

    public function user_mapping($id)
    {
        return redirect()->to('admin-portal-kabid-user/' . $id);
    }

    public function kembali()
    {
        $this->modeAdd = false;
        $this->updatingSrc();
    }

    public function add()
    {
        $this->modeAdd = true;
    }

    public function render()
    {
        $data = Portal_kabid::paginate(10);

        if (strlen($this->src) > 2) {
            $data = Portal_kabid::where('nama_kabid', 'like', "%{$this->src}%")->paginate(10);
        }
        return view('livewire.admin.setting.portal-kabid.portal-kabid-index', [
            'no' => 1,
            'data' => $data
        ])->layout('layouts.main-admin');
    }
}