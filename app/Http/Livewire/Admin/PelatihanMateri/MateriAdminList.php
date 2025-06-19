<?php

namespace App\Http\Livewire\Admin\PelatihanMateri;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_materi;
use Livewire\Component;

class MateriAdminList extends Component
{

    public $modeAdd = false;

    public function lanjut($id)
    {
        return redirect()->to('admin-materi-index/' . $id);
    }

    public function render()
    {
        $data = Pelatihan::where('users_id', auth()->user()->id)->where('aktif', 'Y')->get();
        return view('livewire.admin.pelatihan-materi.materi-admin-list', [
            "data" => $data,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}