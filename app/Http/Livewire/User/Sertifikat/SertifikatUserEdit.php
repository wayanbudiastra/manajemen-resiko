<?php

namespace App\Http\Livewire\User\Sertifikat;

use App\Models\Admin\Pelatihan_user_sertifikat;
use Exception;
use Livewire\Component;

class SertifikatUserEdit extends Component
{
    public $param;
    public $nama_user, $lokasi, $lokasi_x, $lokasi_y, $acc1, $acc1_x, $acc1_y, $acc2,  $acc2_x, $acc12_y;

    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function kembali()
    {
        return redirect()->to('/user-sertifikat-index');
    }

    public function store()
    {
        try {
            $data = Pelatihan_user_sertifikat::find($this->data_id);
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
        try {
            $data = Pelatihan_user_sertifikat::find($this->param);
            //dd($data);
            $this->data_id = $data->id;
            $this->nama_user = $data->nama_user;
            //lokasi di pakai sebagai judul pelatihan dalam sertifikat
            $this->lokasi = $data->lokasi;
            $this->lokasi_x = $data->lokasi_x;
            $this->lokasi_y = $data->lokasi_y;
            $this->acc1 = $data->acc1;
            $this->acc1_x = $data->acc1_x;
            $this->acc1_y = $data->acc1_y;
            $this->acc2 = $data->acc2;
            $this->acc2_x = $data->acc2_x;
            $this->acc2_y = $data->acc2_y;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        return view('livewire.user.sertifikat.sertifikat-user-edit', [
            "data" => $data
        ])->layout('layouts.main');
    }
}