<?php

namespace App\Http\Livewire\User\Sertifikat;

use App\Models\Admin\Pelatihan_user_sertifikat;
use Exception;
use Livewire\Component;

class SertifikatUserIndex extends Component
{

    public function edit_sertifikat($id)
    {
        return redirect()->to('user-sertifikat-edit/' . $id);
    }
    public function render()
    {
        try {
            $data = Pelatihan_user_sertifikat::whereHas('pelatihan_user', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->orderby('id', 'desc')->get();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        //dd($data);
        return view(
            'livewire.user.sertifikat.sertifikat-user-index',
            [
                "no" => 1,
                "data" => $data
            ]
        )->layout('layouts.main');
    }
}