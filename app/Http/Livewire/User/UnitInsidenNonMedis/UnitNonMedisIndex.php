<?php

namespace App\Http\Livewire\User\UnitInsidenNonMedis;

use Livewire\Component;

class UnitNonMedisIndex extends Component
{
    public function render()
    {
        return view('livewire.user.unit-insiden-non-medis.unit-non-medis-index')->layout('layouts.main');
    }
}