<?php

namespace App\Http\Livewire\Admin\PelatihanMateri;

use App\Models\Admin\Pelatihan_materi;
use Livewire\Component;

class MateriAdminVideo extends Component
{
    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function kembali($id)
    {
        return redirect()->to('/admin-materi-index/' . $id);
    }
    public function render()
    {
        $data = Pelatihan_materi::find($this->param);
        $this->nama_pelatihan = $data->nama_materi;
        $this->sumber_data = $data->sumber_data;
        $this->sumber_daya = $data->sumber_daya;
        $this->pelatihan_id = $data->pelatihan_id;
        return view('livewire.admin.pelatihan-materi.materi-admin-video', [
            "data" => $data,
        ])->layout('layouts.main-admin');
    }
}