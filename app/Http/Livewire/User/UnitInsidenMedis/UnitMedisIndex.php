<?php

namespace App\Http\Livewire\User\UnitInsidenMedis;

use Livewire\Component;

class UnitMedisIndex extends Component
{
    public function render()
    {
        return view('livewire.user.unit-insiden-medis.unit-medis-index')->layout('layouts.main');
    }
}