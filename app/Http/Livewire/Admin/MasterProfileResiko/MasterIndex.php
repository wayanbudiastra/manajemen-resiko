<?php

namespace App\Http\Livewire\Admin\MasterProfileResiko;

use App\Models\Risk\Risk_register_master;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class MasterIndex extends Component
{
    use WithPagination;
    public $src;

     public function edit($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-resiko-master-edit/' . $idx);
    }

    public function grade($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('admin-resiko-master-grade/' . $idx);
    }

   public function excel()
    {
        $idx = date('Y');
        return redirect()->to('admin-resiko-master-excel/' . $idx);
    }

    public function render()
    {
         try {

            $data = Risk_register_master::orderby('id', 'desc')->paginate(15);
            if (strlen($this->src) > 1) {
                $data = Risk_register_master::where("aktivitas_kerja", "like", "%{$this->src}%")->orderby('id', 'desc')->paginate(15);
            }

        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.master-profile-resiko.master-index',[
            "no"=> 1,
            "data"=> $data
        ])->layout('layouts.main-admin');
    }
}
