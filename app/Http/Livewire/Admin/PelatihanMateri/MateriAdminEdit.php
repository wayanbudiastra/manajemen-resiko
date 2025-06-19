<?php

namespace App\Http\Livewire\Admin\PelatihanMateri;

use Livewire\Component;

class MateriAdminEdit extends Component
{

    public function render()
    {
        return view('livewire.admin.pelatihan-materi.materi-admin-edit')->layout('layouts.main-admin');
    }
}