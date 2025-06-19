<?php

namespace App\Http\Livewire\Cetak;

use App\Models\Insiden\Insiden_medis_request;
use Livewire\Component;

class InsidenMedis extends Component
{
    public $param;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function render()
    {
        $data = Insiden_medis_request::find($this->param);
        dd($data);

        return view('livewire.cetak.insiden-medis');
    }
}
