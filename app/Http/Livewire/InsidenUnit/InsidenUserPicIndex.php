<?php

namespace App\Http\Livewire\InsidenUnit;

use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenUserPicIndex extends Component
{
    public $counter_medis_open;
    public $counter_nonmedis_open;

    public function lanjut_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-pic-medis-lanjut/' . $idx);
    }

    public function view_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-pic-medis-view/' . $idx);
    }

    public function lanjut_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-pic-nonmedis-lanjut/' . $idx);
    }


    public function view_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-pic-nonmedis-view/' . $idx);
    }

    public function render()
    {
        $data_insiden_medis = Insiden_medis_request::where('pic_insiden_users_id', auth()->user()->id)->where('insiden_status_id', '2')->get();
        $data_insiden_nonmedis = Insiden_nonmedis_request::where('pic_insiden_users_id', auth()->user()->id)->where('insiden_status_id', '2')->get();
        $this->counter_medis_open = $data_insiden_medis->count();
        $this->counter_nonmedis_open = $data_insiden_nonmedis->count();

        return view('livewire.insiden-unit.insiden-user-pic-index', [
            "data_medis" => $data_insiden_medis,
            "data_nonmedis" => $data_insiden_nonmedis,
            "no" => 1,
            "no1" => 1
        ])->layout('layouts.main');
    }
}
