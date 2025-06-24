<?php

namespace App\Http\Livewire\Admin\RiskDeadline;

use App\Models\Risk\Risk_register_master;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class MonitoringDeadlineIndex extends Component
{
    public $deadline_hari;

    use WithPagination;
    public $src;

     public function updatingSrc()
    {
        $this->resetPage();
    }


    public function mount()
    {
        $this->deadline_hari = 90;
    }
    
    public function cek_30hari(){

        $this->deadline_hari = 30;
    }



    public function render()
    {
        
    $data = Risk_register_master::where('aktif','Y')->whereBetween('tgl_deadline', [Carbon::now(), Carbon::now()->addDays($this->deadline_hari)])->paginate(10);
   // dd($data);

   if (strlen($this->src) > 2) {
                $data = Risk_register_master::where("aktivitas_kerja", "like", "%{$this->src}%")->where('aktif','Y')->whereBetween('tgl_deadline', [Carbon::now(), Carbon::now()->addDays($this->deadline_hari)])->paginate(10);
    }

    return view('livewire.admin.risk-deadline.monitoring-deadline-index',[
        "no"=>1,
        "data"=> $data
    ])->layout('layouts.main-admin');
    
   }
}
