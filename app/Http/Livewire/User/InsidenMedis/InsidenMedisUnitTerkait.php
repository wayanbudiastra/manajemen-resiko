<?php

namespace App\Http\Livewire\User\InsidenMedis;

use App\Models\Insiden\Insiden_kategori_medis;
use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_terkait_medis;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenMedisUnitTerkait extends Component
{
    public $param, $ori;
    public $selectedUnit = [];
    public $selectedKategori = [];

    public $selectAll = false;
    public $selectAll1 = false;

    public function mount($param = null)
    {
        $this->param = $param;
        $this->selectedUnit = collect();
        $this->selectedKategori = collect();
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
        return redirect()->to('insiden-medis-index');
    }

    public function store()
    {

        try {
            $idx = Crypt::decrypt($this->param);

            $insert_unit = [];

            foreach ($this->selectedUnit as $key => $data) {
                $cek_maaping = Insiden_unit_terkait_medis::where('insiden_unit_id', $data)->where('insiden_medis_request_id', $idx)->count();
                //cek supaya tidak terjadi double mapping
                if ($cek_maaping == 0) {
                    array_push($insert_unit, ['insiden_medis_request_id' => $idx, 'insiden_unit_id' => $data,  'created_at'=> date('Y-m-d')]);
                }
            }
           // dd($insert_unit);
           Insiden_unit_terkait_medis::insert($insert_unit);



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
        $data = Insiden_medis_request::find($this->ori);

        $data_unit = Insiden_unit::whereDoesntHave('insiden_unit_terkait_medis', function ($query) {
            return $query->where('insiden_medis_request_id', $this->ori);
        })->get(); // data unit yang belum di maping 

        return view('livewire.user.insiden-medis.inisden-medis-unit-terkait', [
            "unit" => $data_unit,
            "data" => $data,
        ])->layout('layouts.main');
    }
}
