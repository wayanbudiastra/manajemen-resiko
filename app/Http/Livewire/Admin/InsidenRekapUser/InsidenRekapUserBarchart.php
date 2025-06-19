<?php

namespace App\Http\Livewire\Admin\InsidenRekapUser;

use App\Models\Insiden\Insiden_rekap_user;
use Livewire\Component;

class InsidenRekapUserBarchart extends Component
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
        $data = Insiden_rekap_user::where('tahun', $this->tahun_now)->orderby('insiden_total_data', 'desc')->limit(6)->get();
       
        if($data->count() > 0){
            foreach ($data as $item) {

                $LabelUnit[] = get_nama_user($item->users_id);
                $insidenumum[] = $item->insiden_nonmedis;
                $insidenmedis[] =  $item->insiden_medis;
            }
    
            $this->medis = $insidenmedis;
            $this->umum = $insidenumum;
            $this->unit = $LabelUnit;
            $this->tahun = $this->param;
        }else{
            $this->medis = "";
            $this->umum = "";
            $this->unit = "";
            $this->tahun = $this->param;  
        }

       
        return view('livewire.admin.insiden-rekap-user.insiden-rekap-user-barchart')->layout('layouts.main-admin');
    }
}
