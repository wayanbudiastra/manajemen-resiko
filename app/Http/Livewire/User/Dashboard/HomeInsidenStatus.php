<?php

namespace App\Http\Livewire\User\Dashboard;

use Livewire\Component;

class HomeInsidenStatus extends Component
{
    public $param;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function render()
    {
        // $status = $this->param;
        // $user = Auth()->user()->id;
        // $insiden_medis = Insiden_medis_request::where('users_id',$id)->where('insiden_status_id',3)->get();
        // $insiden_non_medis = Insiden_nonmedis_request::where('users_id',$id)->where('insiden_status_id',3)->get();

        // return view('livewire.user.dashboard.home-insiden-status',[
        //     "data_medis" => $insiden_medis,
        //     "data_non_medis" => $insiden_non_medis,
        //     "no"=> 1,
        //     "nox" => 1
        // ])->layout('layouts.main');
    }
}
