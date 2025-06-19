<?php

namespace App\Http\Livewire\Admin\PelatihanSoal;

use App\Models\Admin\Pelatihan;
use Livewire\Component;

class SoalAdminList extends Component
{
    public function lanjut($id)
    {
        return redirect()->to('admin-soal-index/' . $id);
    }
    public function render()
    {
        $data = Pelatihan::where('users_id', auth()->user()->id)->where('aktif', 'Y')->get();
        return view('livewire.admin.pelatihan-soal.soal-admin-list', [
            "data" => $data,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}