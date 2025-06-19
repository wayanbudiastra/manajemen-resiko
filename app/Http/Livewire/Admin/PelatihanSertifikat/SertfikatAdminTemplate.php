<?php

namespace App\Http\Livewire\Admin\PelatihanSertifikat;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_sertifikat;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class SertfikatAdminTemplate extends Component
{
    public $param;
    public $lokasi, $lokasi_x, $lokasi_y, $acc1, $acc1_x, $acc1_y, $acc2,  $acc2_x, $acc12_y;
    public $photo;
    public $modeAdd = false;
    use WithFileUploads;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function updatedPhoto()
    {
        $this->validate([
            "photo" => 'required|mimes:jpg,png|max:10000'
        ]);
    }

    public function store()
    {
        $this->validate([
            'photo' => 'required'
        ]);

        try {
            //hapus template lama
            unlink(public_path('storage/' . $this->template_lama));
            
            //upload template baru
            $path = $this->photo->store('sertifikat', 'public');
            
            $data = Pelatihan_sertifikat::find($this->param);
            $data->update([
                "photo" => $path,
            ]);
            session()->flash('success', 'Data Berhasil di tambahkan..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        
        }
    }
    public function kembali()
    {
        return redirect()->to('admin-sertifikat-lanjut/' . $this->pelatihan_id);
    }

    public function render()
    {
        $data = Pelatihan_sertifikat::find($this->param);
        $this->template_lama = $data->photo;
        $this->pelatihan_id = $data->pelatihan_id;



        $sertifikat = Pelatihan_sertifikat::where('pelatihan_id', $this->param)->get();
        //$this->template_lama = $sertifikat->photo;
        // dd($sertifikat);
        return view('livewire.admin.pelatihan-sertifikat.sertfikat-admin-template', [
            "data" => $sertifikat
        ])->layout('layouts.main-admin');
    }
}