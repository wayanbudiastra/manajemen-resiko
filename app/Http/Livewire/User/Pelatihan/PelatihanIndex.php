<?php

namespace App\Http\Livewire\User\Pelatihan;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_user;
use Livewire\Component;

class PelatihanIndex extends Component
{
    public $user_id;
    public $modeAdd = false;

    public function mount()
    {
        $this->user_id = auth()->user()->id;
    }
    public function lanjut($id)
    {
        return redirect()->to('pelatihan-user-detail/' . $id);
    }
    public function render()
    {
        $data = Pelatihan_user::where('user_id', $this->user_id)->whereHas('pelatihan', function ($query) {
            return $query->where('aktif', "Y");
        })->get();
        // dd($data);
        return view('livewire.user.pelatihan.pelatihan-index', [
            "data" => $data,
            "no" => 1
        ])->layout('layouts.main');
    }
}