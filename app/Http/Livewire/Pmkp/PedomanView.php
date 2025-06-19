<?php

namespace App\Http\Livewire\Pmkp;

use Livewire\Component;

class PedomanView extends Component
{

    public function kembali()
    {
        return redirect('/dashboard-requestor');
    }
    public function render()
    {
        return view('livewire.pmkp.pedoman-view')->layout('layouts.main');
    }
}
