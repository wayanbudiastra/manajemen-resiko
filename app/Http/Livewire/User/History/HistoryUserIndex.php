<?php

namespace App\Http\Livewire\User\History;

use App\Models\Admin\Pelatihan_user;
use Exception;
use Livewire\Component;

class HistoryUserIndex extends Component
{
    public function render()
    {
        try {
            $data = Pelatihan_user::where('user_id', auth()->user()->id)->orderby('id', 'desc')->get();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view(
            'livewire.user.history.history-user-index',
            [
                "no" => 1,
                "data" => $data
            ]
        )->layout('layouts.main');
    }
}