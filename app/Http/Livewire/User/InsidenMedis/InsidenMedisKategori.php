<?php

namespace App\Http\Livewire\User\InsidenMedis;

use App\Models\Insiden\Insiden_kategori;
use App\Models\Insiden\Insiden_kategori_medis;
use App\Models\Insiden\Insiden_medis_request;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenMedisKategori extends Component
{
    public $param, $ori;
    public $selectedKategori = [];

    public $selectAll = false;


    public function mount($param = null)
    {
        $this->param = $param;
        $this->selectedKategori = collect();
    }
    public function updatedSelectAll1($value)
    {
        if ($value) {
            $this->selectedKategori = Insiden_kategori::pluck('id');
        } else {
            $this->selectedKategori = [];
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
            $insert_kategori = [];

            foreach ($this->selectedKategori as $key => $data) {
                $cek_maaping = Insiden_kategori_medis::where('insiden_kategori_id', $data)->where('insiden_medis_request_id', $idx)->count();
                //cek supaya tidak terjadi double mapping
                if ($cek_maaping == 0) {
                    array_push($insert_kategori, ['insiden_medis_request_id' => $idx, 'insiden_kategori_id' => $data]);
                }
            }
            Insiden_kategori_medis::insert($insert_kategori);

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

        $data_kategori = Insiden_kategori::whereDoesntHave('insiden_kategori_medis', function ($query) {
            return $query->where('insiden_medis_request_id', $this->ori);
        })->get(); // data kategori yang belum di maping 
        return view('livewire.user.insiden-medis.inisden-medis-kategori', [
            "data" => $data,
            "data_kategori" => $data_kategori,
        ])->layout('layouts.main');
    }
}
