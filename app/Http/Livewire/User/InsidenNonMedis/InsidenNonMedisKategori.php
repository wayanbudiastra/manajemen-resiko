<?php

namespace App\Http\Livewire\User\InsidenNonMedis;

use App\Models\Insiden\Insiden_kategori;
use App\Models\Insiden\Insiden_kategori_nonmedis;
use App\Models\Insiden\Insiden_nonmedis_request;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenNonMedisKategori extends Component
{

    public $selectedKategori = [];
    public $param, $ori;


    public $selectAll1 = false;

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

    public function store()
    {

        try {
            $idx = Crypt::decrypt($this->param);

            $insert_kategori = [];

            foreach ($this->selectedKategori as $key => $data) {
                $cek_maaping = Insiden_kategori_nonmedis::where('insiden_kategori_id', $data)->where('insiden_nonmedis_request_id', $idx)->count();
                //cek supaya tidak terjadi double mapping
                if ($cek_maaping == 0) {
                    array_push($insert_kategori, ['insiden_nonmedis_request_id' => $idx, 'insiden_kategori_id' => $data]);
                }
            }
            Insiden_kategori_nonmedis::insert($insert_kategori);
            session()->flash('success', 'Data Berhasil di ditambahkan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }

    public function kembali()
    {
        return redirect()->to('insiden-non-medis-index');
    }

    public function render()
    {
        $this->ori = Crypt::decrypt($this->param);
        $data = Insiden_nonmedis_request::find($this->ori);
        $data_kategori = Insiden_kategori::whereDoesntHave('insiden_kategori_nonmedis', function ($query) {
            return $query->where('insiden_nonmedis_request_id', $this->ori);
        })->get(); // data kategori yang belum di maping 

        return view('livewire.user.insiden-non-medis.inisden-non-medis-kategori', [
            "data" => $data,
            "data_kategori" => $data_kategori,
        ])->layout('layouts.main');
    }
}
