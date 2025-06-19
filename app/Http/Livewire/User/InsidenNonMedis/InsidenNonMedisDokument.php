<?php

namespace App\Http\Livewire\User\InsidenNonMedis;

use App\Models\Insiden\Insiden_nonmedis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenNonMedisDokument extends Component
{

    public $param,$ori,$dokument_upload;
    
    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function kembali()
    {
       // dd($id);
        return redirect()->to('/insiden-non-medis-index');
    }

    public function render()
    {
       
        $this->ori = Crypt::decrypt($this->param);
        $unit = Insiden_nonmedis_request::find($this->ori);
        $this->dokument_upload=$unit->dokument_upload;
        return view('livewire.user.insiden-non-medis.insiden-non-medis-dokument')->layout('layouts.main');
    }
}
