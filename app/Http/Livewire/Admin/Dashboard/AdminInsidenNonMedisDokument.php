<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Insiden\Insiden_nonmedis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class AdminInsidenNonMedisDokument extends Component
{

    public $param,$ori,$dokument_upload;
    
    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function kembali()
    {
       // dd($id);
        return redirect()->to('/dashboard-admin');
    }

    public function render()
    {
       
        $this->ori = Crypt::decrypt($this->param);
        $unit = Insiden_nonmedis_request::find($this->ori);
        $this->dokument_upload=$unit->dokument_upload;
        return view('livewire.admin.dashboard.admin-insiden-non-medis-dokument')->layout('layouts.main-admin');
    }
  
}
