<?php

namespace App\Http\Livewire\Admin\Setting\PortalKabid;

use App\Models\Admin\Portal_kabid;
use Exception;
use Livewire\Component;

class PortalKabidEdit extends Component
{
    public $param;
    public $nama_kabid = '';
    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-portal-kabid');
    }

    public function store()
    {
        try {
            $this->validate([
                'nama_kabid' => 'required',

            ]);
            $kabid = Portal_kabid::find($this->param);
            $kabid->update([
                "nama_kabid" => $this->nama_kabid,
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
            $data = Portal_kabid::find($this->param);
            $this->nama_kabid = $data->nama_kabid;
            $this->aktif = $data->aktif;

            session()->flash('success', 'Data Berhasil di simpan..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.setting.portal-kabid.portal-kabid-edit', [])->layout('layouts.main-admin');
    }
}