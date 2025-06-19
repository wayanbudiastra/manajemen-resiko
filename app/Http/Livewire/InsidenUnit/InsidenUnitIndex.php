<?php

namespace App\Http\Livewire\InsidenUnit;

use App\Models\Insiden\Insiden_unit_terkait_medis;
use App\Models\Insiden\Insiden_unit_terkait_nonmedis;
use App\Models\Insiden\Insiden_unit_user;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenUnitIndex extends Component
{
    public $unit_user_id = null;
    public $counter_medis_open;
    public $counter_nonmedis_open;

    public function view_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-unit-terkait-nonmedis-view/' . $idx);
    }
    public function view_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-unit-terkait-medis-view/' . $idx);
    }

    public function render()
    {
        $data_unit = Insiden_unit_user::where('users_id', auth()->user()->id)->first();
        if ($data_unit) {
            $this->unit_user_id = $data_unit->insiden_unit_id;
        }

        $data_insiden_medis = Insiden_unit_terkait_medis::where('insiden_unit_id', $this->unit_user_id)->orderby('id', 'desc')->limit(15)->get();
        $data_insiden_nonmedis = Insiden_unit_terkait_nonmedis::where('insiden_unit_id', $this->unit_user_id)->orderby('id', 'desc')->limit(15)->get();
        $this->counter_medis_open = $data_insiden_medis->count();
        $this->counter_nonmedis_open = $data_insiden_nonmedis->count();
        //dd($data_insiden_nonmedis);
        return view('livewire.insiden-unit.insiden-unit-index',  [
            "data_medis" => $data_insiden_medis,
            "data_nonmedis" => $data_insiden_nonmedis,
            "no" => 1,
            "no1" => 1
        ])->layout('layouts.main');
    }
}
