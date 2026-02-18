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
    public $pilih_bulan, $pilih_tahun;
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
        $idx = date('Y') . '' . date('m');
        
        if (empty($this->pilih_tahun) || empty($this->pilih_bulan)) {
            session()->flash('error', "Validasi gagal, masih ada yang kosong");
            return;
        }else{

      //  dd("Validasi berhasil");
        $idx = $this->pilih_tahun . '' . $this->pilih_bulan;
       
        return redirect()->to('admin-resiko-master-excel/' . $idx);
        }
    }

    public function render()
    {
        try {

            $data = Risk_register_master::orderby('id', 'desc')->paginate(15);
            //dd($data);
            $years = [];
            $currentYear = date('Y'); // Tahun sekarang
            for ($i = 0; $i < 5; $i++) {
                $years[] = $currentYear - $i;
            }

            $mounts = [
                ["no" => "01", "bulan" => "Januari"],
                ["no" => "02", "bulan" => "Februari"],
                ["no" => "03", "bulan" => "Maret"],
                ["no" => "04", "bulan" => "April"],
                ["no" => "05", "bulan" => "Mei"],
                ["no" => "06", "bulan" => "Juni"],
                ["no" => "07", "bulan" => "Juli"],
                ["no" => "08", "bulan" => "Agustus"],
                ["no" => "09", "bulan" => "September"],
                ["no" => "10", "bulan" => "Oktober"],
                ["no" => "11", "bulan" => "November"],
                ["no" => "12", "bulan" => "Desember"],
            ];
            if (strlen($this->src) > 1) {
                $data = Risk_register_master::where("aktivitas_kerja", "like", "%{$this->src}%")->orderby('id', 'desc')->paginate(15);
            }
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.master-profile-resiko.master-index', [
            "no" => 1,
            "data" => $data,
            "years" => $years,
            "mounts" => $mounts,
        ])->layout('layouts.main-admin');
    }
}
