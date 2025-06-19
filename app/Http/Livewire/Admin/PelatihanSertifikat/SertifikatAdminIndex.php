<?php

namespace App\Http\Livewire\Admin\PelatihanSertifikat;

use App\Models\Admin\Pelatihan;
use Livewire\Component;

class SertifikatAdminIndex extends Component
{
    public $modeAdd = false;

    public function lanjut($id)
    {
        return redirect()->to('admin-sertifikat-lanjut/' . $id);
    }

    public function render()
    {
        $data = Pelatihan::where('users_id', auth()->user()->id)->where('aktif', 'Y')->where('sertifikat', 'Y')->get();
        return view('livewire.admin.pelatihan-sertifikat.sertifikat-admin-index', [
            "data" => $data,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}