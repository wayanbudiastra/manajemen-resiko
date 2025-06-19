<?php

namespace App\Http\Livewire\Pmkp;

use Livewire\Component;

class PedomanViewAdmin extends Component
{
    public function kembali()
    {
        return redirect('/dashboard-admin');
    }

    public function render()
    {
        return view('livewire.pmkp.pedoman-view-admin')->layout('layouts.main-admin');
    }
}
