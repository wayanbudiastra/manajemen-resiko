<?php

namespace App\Http\Livewire\Admin\Dashboard;


use App\Models\Risk\Risk_register_master;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $portal_rendah, $portal_sedang, $portal_tinggi, $portal_ekstrim, $labels, $data;


    public function render()
    {


        $ds_rendah = Risk_register_master::where('aktif', 'Y')->where('matrik_kontrol_grade', '1')->count();

        $ds_sedang = Risk_register_master::where('aktif', 'Y')->where('matrik_kontrol_grade', '2')->count();

        $ds_tinggi = Risk_register_master::where('aktif', 'Y')->where('matrik_kontrol_grade', '3')->count();

        $ds_ekstrim = Risk_register_master::where('aktif', 'Y')->where('matrik_kontrol_grade', '4')->count();

        $this->portal_rendah = $ds_rendah;

        // dd($data_reject);
        $this->portal_tinggi = $ds_tinggi;


        $this->portal_ekstrim = $ds_ekstrim;

        $this->portal_sedang = $ds_sedang;

        $this->labels = ['Rendah', 'Sedang', 'Tinggi', 'Ekstrim'];
        $this->data = [$ds_rendah, $ds_sedang, $ds_tinggi, $ds_ekstrim];
        
        return view('livewire.admin.dashboard.dashboard-admin')->layout('layouts.main-admin');
    }
}
