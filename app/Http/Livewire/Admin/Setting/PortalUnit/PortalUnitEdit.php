<?php

namespace App\Http\Livewire\Admin\Setting\PortalUnit;

use App\Models\Admin\Portal_kabid;
use App\Models\Admin\Portal_unit;
use Exception;
use Livewire\Component;

class PortalUnitEdit extends Component
{
    public $param;
    public $nama_unit = '';
    public $portal_kabid_id = '';
    public $aktif = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-portal-unit');
    }

    public function store()
    {
        try {
            $this->validate([
                'nama_unit' => 'required',
                'portal_kabid_id' => 'required',
            ]);
            $pelatihan = Portal_unit::find($this->param);
            $pelatihan->update([
                "nama_unit" => $this->nama_unit,
                "portal_kabid_id" => $this->portal_kabid_id,
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
            $data = Portal_unit::find($this->param);
            $this->nama_unit = $data->nama_unit;
            $this->portal_kabid_id = $data->portal_kabid_id;
            $this->aktif = $data->aktif;
            $kabid = Portal_kabid::where('aktif', 'Y')->get();
            session()->flash('success', 'Data Berhasil di simpan..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.setting.portal-unit.portal-unit-edit', [
            'kabid' => $kabid,
        ])->layout('layouts.main-admin');
    }
}