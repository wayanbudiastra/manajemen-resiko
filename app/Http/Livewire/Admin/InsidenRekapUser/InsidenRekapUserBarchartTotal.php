<?php

namespace App\Http\Livewire\Admin\InsidenRekapUser;

use App\Models\Insiden\Insiden_rekap_user;
use Livewire\Component;

class InsidenRekapUserBarchartTotal extends Component
{

    public $tahun_now;
    public $param;
    public $medis;
    public $umum;
    public $unit;
    public $tahun;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {

        return redirect()->to('/admin-insiden-total-user');
    }
    public function render()
    {
        $yearsAgo = array();
        $currentYear = date("Y");
     
        for ($i = 0; $i < 5; $i++) {
            $yearsAgo[] = $currentYear - $i;
        } 
        $this->tahun_now = $this->param;

        $data = Insiden_rekap_user::where('tahun',$this->tahun_now)->orderby('insiden_total_data','desc')->limit(6)->get();
       // dd($data);
       if($data->count() > 0){
        foreach ($data as $item) {

            $LabelUnit[] = get_nama_user($item->users_id);
            $insidenumum[] = $item->insiden_total_data;
           
        }
        $this->umum = $insidenumum;
        $this->unit = $LabelUnit;
        $this->tahun = $this->param;

       }else{
        $this->umum ="";
        $this->unit = "";
        $this->tahun = $this->param;
       }

       
    return view('livewire.admin.insiden-rekap-user.insiden-rekap-user-barchart-total')->layout('layouts.main-admin');
    }
   
}
