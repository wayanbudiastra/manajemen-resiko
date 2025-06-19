<?php

namespace App\Http\Livewire\Admin\Setting\PortalVendor;

use App\Models\Admin\Portal_vendor;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class PortalVendorIndex extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_vendor = '', $vendor_purchasing = '', $telephone = '', $faximile = '', $person_incharge = '', $handphone = '', $email = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function store()
    {
        $this->validate([
            'nama_vendor' => 'required',
            'person_incharge' => 'required',
            'handphone' => 'required',
            'vendor_purchasing' => 'required',
            'email' => 'required',
        ]);
        try {
            Portal_vendor::create([
                "nama_vendor" => $this->nama_vendor,
                "telephone" => $this->telephone,
                "faximile" => $this->faximile,
                "person_incharge" => $this->person_incharge,
                "handphone" => $this->handphone,
                "vendor_purchasing" => $this->vendor_purchasing,
                "email" => $this->email,
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function edit($id)
    {
        return redirect()->to('admin-portal-vendor-edit/' . $id);
    }

    public function kembali()
    {
        $this->modeAdd = false;
        $this->updatingSrc();
    }

    public function add()
    {
        $this->vendor_purchasing = 'Y';
        $this->modeAdd = true;
    }

    public function render()
    {

        $data = Portal_vendor::paginate(10);

        if (strlen($this->src) > 2) {
            $data = Portal_vendor::where('nama_vendor', 'like', "%{$this->src}%")->paginate(10);
        }
        return view('livewire.admin.setting.portal-vendor.portal-vendor-index', [
            'no' => 1,
            'data' => $data
        ])->layout('layouts.main-admin');
    }
}