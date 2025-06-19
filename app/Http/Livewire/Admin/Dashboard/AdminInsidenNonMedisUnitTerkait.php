<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_terkait_nonmedis;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class AdminInsidenNonMedisUnitTerkait extends Component
{

    public $param, $ori;
    public $selectedUnit = [];
    public $selectAll = false;

    public function mount($param = null)
    {
        $this->param = $param;
        $this->selectedUnit = collect();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedUnit = Insiden_unit::pluck('id');
        } else {
            $this->selectedUnit = [];
        }
    }

    public function kembali()
    {
        $this->ori = Crypt::decrypt($this->param);
        $data = Insiden_nonmedis_request::find($this->ori);
        $status_idx = id_encrypt($data->insiden_status_id);
        return redirect()->to('insiden-rekap-nonmedis-status/'.$status_idx);
    }

    public function store()
    {
        try {
            $idx = Crypt::decrypt($this->param);
            $insert_unit = [];
            foreach ($this->selectedUnit as $key => $data) {
                $cek_maaping = Insiden_unit_terkait_nonmedis::where('insiden_unit_id', $data)->where('insiden_nonmedis_request_id', $idx)->count();
                //cek supaya tidak terjadi double mapping
                if ($cek_maaping == 0) {
                    array_push($insert_unit, ['insiden_nonmedis_request_id' => $idx, 'insiden_unit_id' => $data, 'created_at'=> date('Y-m-d')]);
                }
            }
            Insiden_unit_terkait_nonmedis::insert($insert_unit);
            session()->flash('success', 'Data Berhasil di ditambahkan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }

    public function render()
    {
        $this->ori = Crypt::decrypt($this->param);
        $data = Insiden_nonmedis_request::find($this->ori);

        $data_unit = Insiden_unit::whereDoesntHave('insiden_unit_terkait_nonmedis', function ($query) {
            return $query->where('insiden_nonmedis_request_id', $this->ori);
        })->get(); // data unit yang belum di maping 

        return view('livewire.admin.dashboard.admin-insiden-non-medis-unit-terkait', [
            "unit" => $data_unit,
            "data" => $data,
        ])->layout('layouts.main-admin');
    }
   
}
