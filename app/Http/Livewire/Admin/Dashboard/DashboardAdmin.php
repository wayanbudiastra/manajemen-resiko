<?php

namespace App\Http\Livewire\Admin\Dashboard;


use App\Models\Risk\Risk_register_master;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $portal_rendah,$portal_sangat_rendah, $portal_sedang, $portal_tinggi, $portal_sangat_tinggi, $labels, $data;

    public $rendah_sekali , $rendah , $sedang , $tinggi , $tinggi_sekali, $label_bulan, $tahun;

    public function render()
    {
        $this->tahun = date('Y');

        $ds_sangat_rendah = Risk_register_master::where('aktif', 'Y')->where('matrik_monitoring_grade', '1')->count();
        $ds_rendah = Risk_register_master::where('aktif', 'Y')->where('matrik_monitoring_grade', '2')->count();
        $ds_sedang = Risk_register_master::where('aktif', 'Y')->where('matrik_monitoring_grade', '3')->count();
        $ds_tinggi = Risk_register_master::where('aktif', 'Y')->where('matrik_monitoring_grade', '4')->count();
        $ds_sangat_tinggi = Risk_register_master::where('aktif', 'Y')->where('matrik_monitoring_grade', '5')->count();


        $this->portal_sangat_rendah = $ds_sangat_rendah;
        $this->portal_rendah = $ds_rendah;

        // dd($data_reject);
        $this->portal_tinggi = $ds_tinggi;


        $this->portal_sangat_tinggi= $ds_sangat_tinggi;

        $this->portal_sedang = $ds_sedang;

        $this->labels = ['sangat_rendah','Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
        $this->data = [$ds_sangat_rendah, $ds_rendah, $ds_sedang, $ds_tinggi, $ds_sangat_tinggi];



        $this->label_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        $this->rendah_sekali = [
            rekap_risk_unit_all($this->tahun, '01', 1),
            rekap_risk_unit_all($this->tahun, '02', 1),
            rekap_risk_unit_all($this->tahun, '03', 1),
            rekap_risk_unit_all($this->tahun, '04', 1),
            rekap_risk_unit_all($this->tahun, '05', 1),
            rekap_risk_unit_all($this->tahun, '06', 1),
            rekap_risk_unit_all($this->tahun, '07', 1),
            rekap_risk_unit_all($this->tahun, '08', 1),
            rekap_risk_unit_all($this->tahun, '09', 1),
            rekap_risk_unit_all($this->tahun, '10', 1),
            rekap_risk_unit_all($this->tahun, '11', 1),
            rekap_risk_unit_all($this->tahun, '12', 1),
        ];
        $this->rendah = [
            rekap_risk_unit_all($this->tahun, '01', 2),
            rekap_risk_unit_all($this->tahun, '02', 2),
            rekap_risk_unit_all($this->tahun, '03', 2),
            rekap_risk_unit_all($this->tahun, '04', 2),
            rekap_risk_unit_all($this->tahun, '05', 2),
            rekap_risk_unit_all($this->tahun, '06', 2),
            rekap_risk_unit_all($this->tahun, '07', 2),
            rekap_risk_unit_all($this->tahun, '08', 2),
            rekap_risk_unit_all($this->tahun, '09', 2),
            rekap_risk_unit_all($this->tahun, '10', 2),
            rekap_risk_unit_all($this->tahun, '11', 2),
            rekap_risk_unit_all($this->tahun, '12', 2),
        ];
        $this->sedang = [
            rekap_risk_unit_all($this->tahun, '01', 3),
            rekap_risk_unit_all($this->tahun, '02', 3),
            rekap_risk_unit_all($this->tahun, '03', 3),
            rekap_risk_unit_all($this->tahun, '04', 3),
            rekap_risk_unit_all($this->tahun, '05', 3),
            rekap_risk_unit_all($this->tahun, '06', 3),
            rekap_risk_unit_all($this->tahun, '07', 3),
            rekap_risk_unit_all($this->tahun, '08', 3),
            rekap_risk_unit_all($this->tahun, '09', 3),
            rekap_risk_unit_all($this->tahun, '10', 3),
            rekap_risk_unit_all($this->tahun, '11', 3),
            rekap_risk_unit_all($this->tahun, '12', 3),
        ];
        $this->tinggi = [
            rekap_risk_unit_all($this->tahun, '01', 4),
            rekap_risk_unit_all($this->tahun, '02', 4),
            rekap_risk_unit_all($this->tahun, '03', 4),
            rekap_risk_unit_all($this->tahun, '04', 4),
            rekap_risk_unit_all($this->tahun, '05', 4),
            rekap_risk_unit_all($this->tahun, '06', 4),
            rekap_risk_unit_all($this->tahun, '07', 4),
            rekap_risk_unit_all($this->tahun, '08', 4),
            rekap_risk_unit_all($this->tahun, '09', 4),
            rekap_risk_unit_all($this->tahun, '10', 4),
            rekap_risk_unit_all($this->tahun, '11', 4),
            rekap_risk_unit_all($this->tahun, '12', 4),
        ];
        $this->tinggi_sekali =[
            rekap_risk_unit_all($this->tahun, '01', 5),
            rekap_risk_unit_all($this->tahun, '02', 5),
            rekap_risk_unit_all($this->tahun, '03', 5),
            rekap_risk_unit_all($this->tahun, '04', 5),
            rekap_risk_unit_all($this->tahun, '05', 5),
            rekap_risk_unit_all($this->tahun, '06', 5),
            rekap_risk_unit_all($this->tahun, '07', 5),
            rekap_risk_unit_all($this->tahun, '08', 5),
            rekap_risk_unit_all($this->tahun, '09', 5),
            rekap_risk_unit_all($this->tahun, '10', 5),
            rekap_risk_unit_all($this->tahun, '11', 5),
            rekap_risk_unit_all($this->tahun, '12', 5),
        ];

        
        return view('livewire.admin.dashboard.dashboard-admin')->layout('layouts.main-admin');
    }
}
