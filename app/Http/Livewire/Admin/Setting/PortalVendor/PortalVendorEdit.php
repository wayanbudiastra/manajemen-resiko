<?php

namespace App\Http\Livewire\Admin\Setting\PortalVendor;

use App\Models\Admin\Portal_vendor;
use Exception;
use Livewire\Component;

class PortalVendorEdit extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $param, $nama_vendor = '', $vendor_purchasing = '', $telephone = '', $faximile = '', $person_incharge = '', $handphone = '', $email = '';


    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-portal-vendor');
    }

    public function store()
    {
        try {
            $this->validate([
                'nama_vendor' => 'required',

            ]);
            $vendor = Portal_vendor::find($this->param);
            $vendor->update([
                "nama_vendor" => $this->nama_vendor,
                "telephone" => $this->telephone,
                "faximile" => $this->faximile,
                "person_incharge" => $this->person_incharge,
                "handphone" => $this->handphone,
                "vendor_purchasing" => $this->vendor_purchasing,
                "email" => $this->email,
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
            $data = Portal_vendor::find($this->param);
            $this->nama_vendor = $data->nama_vendor;
            $this->telephone = $data->telephone;
            $this->faximile = $data->faximile;
            $this->person_incharge = $data->person_incharge;
            $this->handphone = $data->handphone;
            $this->email = $data->email;
            $this->vendor_purchasing = $data->vendor_purchasing;
            $this->aktif = $data->aktif;
            session()->flash('success', 'Data Berhasil di simpan..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.setting.portal-vendor.portal-vendor-edit', [])->layout('layouts.main-admin');
    }
}