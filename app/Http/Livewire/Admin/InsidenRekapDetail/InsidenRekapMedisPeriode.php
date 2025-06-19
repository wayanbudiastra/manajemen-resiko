<?php

namespace App\Http\Livewire\Admin\InsidenRekapDetail;

use App\Models\Insiden\Insiden_medis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenRekapMedisPeriode extends Component
{
    public $param,$param1, $src;
  
    public function mount($param = null, $param1 = null)
    {
        $this->param = $param;
        $this->param1 = $param1;
    }

    public function add_unit_terkait($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-medis-unit/' . $idx);
    }
    public function add_kategori($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-medis-kategori/' . $idx);
    }

    public function lanjut_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-medis-lanjut/' . $idx);
    }
    public function edit_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-medis-edit/' . $idx);
    }

    public function view_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-medis-view/' . $idx);
    }

    public function download_medis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-medis-view/' . $idx);
    }


    public function render()
    {
        $idx = Crypt::decrypt($this->param);
        $tahun_now = Crypt::decrypt($this->param1);
        $data = Insiden_medis_request::whereYear('created_at', $tahun_now)->whereMonth('created_at', $idx)->get();
        if (strlen($this->src) > 2) {
            $data = Insiden_medis_request::where('judul_insiden', 'like', "%{$this->src}%")->orWhere('kronologi_kejadian', 'like', "%{$this->src}%")->whereYear('created_at', $tahun_now)->whereMonth('created_at', $idx)->get();
        }
        return view('livewire.admin.insiden-rekap-detail.insiden-rekap-medis-periode',[
            "data"=> $data,
            "no" => 1
        ])->layout('layouts.main-admin');
    }

   
}
