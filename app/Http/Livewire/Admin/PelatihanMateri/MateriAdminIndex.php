<?php

namespace App\Http\Livewire\Admin\PelatihanMateri;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_materi;
use App\Models\Master_v1\Materi_type;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class MateriAdminIndex extends Component
{

    public $param;
    public $modeAddPdf = false;
    public $modeAddVideo = false;
    public $materi_pdf = 1;
    public $materi_video = 2;
    public $public = 'N', $photo, $nama_materi, $sumber_data, $sumber_daya;
    use WithFileUploads;

    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function updatedPhoto()
    {
        $this->validate([
            "photo" => 'required|mimes:pdf|max:10000'
        ]);
    }

    public function addPdf()
    {
        $this->modeAddPdf = true;
    }

    public function addVideo()
    {
        $this->modeAddVideo = true;
    }

    public function view_materi($id)
    {
        $pelatihan_materi = Pelatihan_materi::find($id);
        if ($pelatihan_materi->materi_type_id == '1') {
            return redirect()->to('/admin-materi-pdf/' . $id);
        } else {
            return redirect()->to('/admin-materi-video/' . $id);
        }
    }
    public function storePdf()
    {
        $this->validate([
            "nama_materi" => 'required',
            "sumber_data" => 'required',
            "photo" => 'required',

        ]);

        $path = $this->photo->store('materi_pdf', 'public');
        try {
            Pelatihan_materi::create([
                "pelatihan_id" => $this->param,
                "nama_materi" => $this->nama_materi,
                "materi_type_id" => $this->materi_pdf,
                "sumber_data" => $this->sumber_data,
                "sumber_daya" => $path,
                "public" => $this->public,
            ]);


            $this->nama_materi = '';
            $this->sumber_daya = '';
            $this->sumber_data = '';
            session()->flash('success', 'Data Materi Berhasil ditambahkan...');
            $this->modeAddPdf = false;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi kesalahan...' . $e);
            $this->modeAddPdf = false;
        }
    }
    public function delete($id)
    {
        try {
            $data = Pelatihan_materi::find($id);
            //jika file adalah pdf
            if ($data->materi_type_id == '1') {
                unlink(public_path('storage/' . $data->sumber_daya));
            }


            $data->delete();
            session()->flash('success', 'Data Materi Berhasil dihapus...');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi kesalahan...' . $e);
        }
    }
    public function storeVideo()
    {
        $this->validate([
            "nama_materi" => 'required',
            "sumber_data" => 'required',
            "sumber_daya" => 'required',

        ]);

        try {
            Pelatihan_materi::create([
                "pelatihan_id" => $this->param,
                "nama_materi" => $this->nama_materi,
                "materi_type_id" => $this->materi_video,
                "sumber_data" => $this->sumber_data,
                "sumber_daya" => $this->sumber_daya,
                "public" => $this->public,
            ]);

            $this->nama_materi = '';
            $this->sumber_daya = '';
            $this->sumber_data = '';
            session()->flash('success', 'Data Materi Berhasil ditambahkan...');
            $this->modeAddVideo = false;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi kesalahan...' . $e);
            $this->modeAddVideo = false;
        }
    }

    public function kembali()
    {
        $this->modeAddPdf = false;
        $this->modeAddVideo = false;
    }

    public function kembali_index($id)
    {
        return redirect()->to('/admin-pelatihan-lanjut/' . $id);
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

        $materi = Pelatihan_materi::where('pelatihan_id', $this->param)->get();
        $materi_type = Materi_type::where('aktif', 'Y')->get();

        return view('livewire.admin.pelatihan-materi.materi-admin-index', [
            "data" => $materi,
            "materi_type" => $materi_type,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}