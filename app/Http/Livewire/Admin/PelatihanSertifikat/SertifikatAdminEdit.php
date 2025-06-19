<?php

namespace App\Http\Livewire\Admin\PelatihanSertifikat;

use App\Models\Admin\Pelatihan_sertifikat;
use Exception;
use Livewire\Component;

class SertifikatAdminEdit extends Component
{
    public $param;
    public $lokasi, $lokasi_x, $lokasi_y, $acc1, $acc1_x, $acc1_y, $acc2,  $acc2_x, $acc12_y;

    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function kembali()
    {
        return redirect()->to('admin-sertifikat-lanjut/' . $this->param);
    }
    public function review_template()
    {
        return redirect()->to('admin-sertifikat-review/' . $this->param);
    }

    public function store($id)
    {
       

        try {
            $data = Pelatihan_sertifikat::find($id);
            $data->update([
                "lokasi_x" => $this->lokasi_x,
                "lokasi_y" => $this->lokasi_y,
                "acc1_x" => $this->acc1_x,
                "acc1_y" => $this->acc1_y,
                "acc2_x" => $this->acc2_x,
                "acc2_y" => $this->acc2_y,
            ]);
            session()->flash('success', 'Data Berhasil di tambahkan..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function render()
    {
        $data = Pelatihan_sertifikat::find($this->param);
        $this->lokasi = $data->lokasi;
        $this->lokasi_x = $data->lokasi_x;
        $this->lokasi_y = $data->lokasi_y;
        $this->acc1 = $data->acc1;
        $this->acc1_x = $data->acc1_x;
        $this->acc1_y = $data->acc1_y;
        $this->acc2 = $data->acc2;
        $this->acc2_x = $data->acc2_x;
        $this->acc2_y = $data->acc2_y;

        return view('livewire.admin.pelatihan-sertifikat.sertifikat-admin-edit', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}