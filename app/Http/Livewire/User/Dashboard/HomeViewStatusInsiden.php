<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class HomeViewStatusInsiden extends Component
{
    public $param;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function lanjut_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-lanjut/' . $idx);
    }
    public function edit_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-edit/' . $idx);
    }

    public function view_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-view/' . $idx);
    }

    public function cetak_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('cetak-insiden-medis/' . $idx);
    }

    public function lanjut_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-lanjut/' . $idx);
    }
    public function edit_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-edit/' . $idx);
    }

    public function view_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-view/' . $idx);
    }

    public function cetak_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        dd($idx);
        return redirect()->to('cetak-insiden-nonmedis/' . $idx);
    }


    public function render()
    {
        $status = $this->param;
        $id = Auth()->user()->id;
        $insiden_medis = Insiden_medis_request::where('users_id',$id)->where('insiden_status_id',$status)->get();
        $insiden_nonmedis = Insiden_nonmedis_request::where('users_id',$id)->where('insiden_status_id',$status)->get();
        $counter_medis_open = Insiden_medis_request::where('users_id',$id)->where('insiden_status_id',$status)->count();
        $counter_nonmedis_open = Insiden_nonmedis_request::where('users_id',$id)->where('insiden_status_id',$status)->count();
        return view('livewire.user.dashboard.home-view-status-insiden',[
            "data_medis" => $insiden_medis,
            "data_nonmedis" => $insiden_nonmedis,
            "counter_nonmedis_open" => $counter_nonmedis_open,
            "counter_medis_open" => $counter_medis_open,
            "no"=> 1,
            "nox" => 1
        ])->layout('layouts.main');
       
    }
}
