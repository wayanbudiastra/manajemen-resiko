<?php

namespace App\Http\Livewire\Admin\PelatihanUser;

use App\Models\Admin\Pelatihan;
use Livewire\Component;

class MappingPelatihanList extends Component
{
    public $modeAdd = false;

    public function lanjut($id)
    {
        return redirect()->to('admin-mapping-index/' . $id);
    }
    public function render()
    {
        $data = Pelatihan::where('users_id', auth()->user()->id)->where('aktif', 'Y')->get();
        return view('livewire.admin.pelatihan-user.mapping-pelatihan-list', [
            "data" => $data,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}