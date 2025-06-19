<?php

namespace App\Http\Livewire\Admin\PelatihanSertifikat;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_sertifikat;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SertifikatAdminSetup extends Component
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

    public function add()
    {
        $this->lokasi = "";
        $this->lokasi_x = "85";
        $this->lokasi_y = "135";
        $this->acc1 = "";
        $this->acc1_x = "103";
        $this->acc1_y = "145";
        $this->acc2 = "";
        $this->acc2_x = "109";
        $this->acc2_y = "154";
        $this->modeAdd = true;
    }

    public function delete($id)
    {
        try {
            $data = Pelatihan_sertifikat::find($id);
           // File::delete(public_path($data->photo));
           unlink(public_path('storage/' . $data->photo));
         //  Storage::delete($data->photo);
            $data->delete();
            session()->flash('success', 'Data Berhasil di hapus..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function edit($id)
    {
        return redirect()->to('/admin-sertifikat-edit/' . $id);
    }

    public function store()
    {
        $this->validate([
            'photo' => 'required'
        ]);
        $path = $this->photo->store('sertifikat', 'public');
        try {
            $data = Pelatihan_sertifikat::create([
                "pelatihan_id" => $this->param,
                "lokasi" => $this->lokasi,
                "lokasi_x" => $this->lokasi_x,
                "lokasi_y" => $this->lokasi_y,
                "acc1" => $this->acc1,
                "acc1_x" => $this->acc1_x,
                "acc1_y" => $this->acc1_y,
                "acc2" => $this->acc2,
                "acc2_x" => $this->acc2_x,
                "acc2_y" => $this->acc2_y,
                "photo" => $path,
            ]);
            $this->modeAdd = false;
            session()->flash('success', 'Data Berhasil di tambahkan..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->modeAdd = false;
        }
    }

    public function kembali()
    {
        $this->modeAdd = false;
    }

    public function template($id)
    {
        return redirect()->to('admin-sertifikat-template/' . $id);
    }
    public function view_sertifikat($id)
    {
        $data = Pelatihan_sertifikat::find($id);
        dd($data);
    }

    public function render()
    {
        $data = Pelatihan::find($this->param);
        $this->nama_pelatihan = $data->nama_pelatihan;
        $this->jenis_pelatihan = $data->kelas_jenis->nama_kelas_jenis;
        $this->pelatihan_skill = $data->kelas_skill->nama_kelas_skill;
        $this->total_jam = $data->total_jam;
        $this->keterangan = $data->keterangan;
        $this->subpelatihan = $data->subpelatihan;
        $this->limit_akses = $data->limit_akses;
        $this->total_bobot = $data->total_bobot;
        $this->kelulusan = $data->kelulusan;
        $this->pretes = $data->pretes;
        $this->materi = $data->materi;
        $this->postes = $data->postes;
        $this->total_sertifikat = Pelatihan_sertifikat::where('pelatihan_id', $this->param)->count();

        //add bisa apabila belum ada sertifikat 
        //sementara hanya bisa satu pelatihan 1 sertifikat

        $sertifikat = Pelatihan_sertifikat::where('pelatihan_id', $this->param)->get();

        return view('livewire.admin.pelatihan-sertifikat.sertifikat-admin-setup', [
            "sertifikat" => $sertifikat,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}