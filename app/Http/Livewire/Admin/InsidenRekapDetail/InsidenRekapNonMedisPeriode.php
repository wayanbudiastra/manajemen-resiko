<?php

namespace App\Http\Livewire\Admin\InsidenRekapDetail;

use App\Models\Insiden\Insiden_nonmedis_request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenRekapNonMedisPeriode extends Component
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
        return redirect()->to('admin-non-medis-unit/' . $idx);
    }
    public function add_kategori($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-non-medis-kategori/' . $idx);
    }

    public function lanjut_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-non-medis-lanjut/' . $idx);
    }
    public function edit_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-non-medis-edit/' . $idx);
    }

    public function view_nonmedis($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-non-medis-view/' . $idx);
    }

    public function render()
    {
        $idx = Crypt::decrypt($this->param);
        $tahun_now = Crypt::decrypt($this->param1);
        $data = Insiden_nonmedis_request::whereYear('tgl_insiden', $tahun_now)->whereMonth('tgl_insiden', $idx)->get();
       // dd($data);

       if (strlen($this->src) > 2) {
        $data = Insiden_nonmedis_request::where('judul_insiden', 'like', "%{$this->src}%")->where('insiden_status_id',$idx)->whereYear('tgl_insiden', $tahun_now)->get();
    }

        return view('livewire.admin.insiden-rekap-detail.insiden-rekap-non-medis-periode',[
            "data"=>$data,
            "no"=> 1
        ])->layout('layouts.main-admin');
    }
  
}
