<?php

namespace App\Http\Livewire\User\InsidenMedis;

use App\Models\Insiden\Insiden_jenis;
use App\Models\Insiden\Insiden_kategori;
use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_penanggung_biaya;
use App\Models\Insiden\Insiden_ruangan;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenMedisEdit extends Component
{

    public $param, $param_ori, $judul_insiden, $users_id;
    public $ori, $insiden_frekuensi_id;
    public $nomor_insiden = '', $tgl_insiden = '', $insiden_ruangan_id = '', $insiden_kategori_id = '', $sudah_pernah_terjadi;
    public $tindakan_dilakukan_oleh = '', $insiden_status_id = '', $insiden_grade_id = '', $dampak = '';
    public $frekuensi = '', $score_insiden = '', $akar_masalah, $insiden_jenis_id;
    public $akar_masalah_lengkap = '', $rencana_tindak_lanjut = '', $deadline = '', $kronologi_kejadian, $tindakan_segera_dilakukan, $penyebab_langsung_insiden;
    public $inisial_pasien, $umur, $jenis_kelamin, $insiden_penanggung_biaya_id, $tgl_masuk_rs;

    public $selectedUnit = [];
    public $selectedKategori = [];

    public $selectAll = false;
    public $selectAll1 = false;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('insiden-medis-index');
    }

    public function store()
    {
        $this->validate([
            'judul_insiden' => 'required',
            'tgl_insiden' => 'required',
            'insiden_ruangan_id' => 'required',
            'kronologi_kejadian' => 'required',
            'tindakan_segera_dilakukan' => 'required',
            'insiden_jenis_id' => 'required',
            'sudah_pernah_terjadi' => 'required'
        ]);
        try {
            $idx = Crypt::decrypt($this->param);
            $insiden_non_medis = Insiden_medis_request::find($idx);
            $insiden_non_medis->update([
                "judul_insiden" => $this->judul_insiden,
                "tgl_insiden" => $this->tgl_insiden,
                "insiden_ruangan_id" => $this->insiden_ruangan_id,
                "tindakan_dilakukan_oleh" => $this->tindakan_dilakukan_oleh,
                "kronologi_kejadian" => $this->kronologi_kejadian,
                "tindakan_segera_dilakukan" => $this->tindakan_segera_dilakukan,
                "sudah_pernah_terjadi" => $this->sudah_pernah_terjadi,
                "insiden_jenis_id" => $this->insiden_jenis_id,
                'inisial_pasien' => $this->inisial_pasien,
                'umur' => $this->umur,
                'jenis_kelamin' => $this->jenis_kelamin,
                'insiden_penanggung_biaya_id' => $this->insiden_penanggung_biaya_id,
                'tgl_masuk_rs' => $this->tgl_masuk_rs,
                "tindakan_dilakukan_oleh" => $this->tindakan_dilakukan_oleh,
            ]);
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

        $this->nomor_insiden = $data->nomor_insiden;
        $this->judul_insiden = $data->judul_insiden;
        $this->tgl_insiden = $data->tgl_insiden;
        $this->insiden_ruangan_id = $data->insiden_ruangan_id;
        $this->insiden_kategori_id = $data->insiden_kategori_id;
        $this->tindakan_dilakukan_oleh = $data->tindakan_dilakukan_oleh;
        $this->kronologi_kejadian = $data->kronologi_kejadian;
        $this->tindakan_segera_dilakukan = $data->tindakan_segera_dilakukan;
        $this->sudah_pernah_terjadi = $data->sudah_pernah_terjadi;
        $this->insiden_status_id = $data->insiden_status_id;
        $this->insiden_jenis_id = $data->insiden_jenis_id;
        $this->inisial_pasien = $data->inisial_pasien;
        $this->umur = $data->umur;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->insiden_penanggung_biaya_id = $data->insiden_penanggung_biaya_id;
        $this->tgl_masuk_rs = $data->tgl_masuk_rs;
        $this->tindakan_dilakukan_oleh = $data->tindakan_dilakukan_oleh;

        $ruangan = Insiden_ruangan::where('aktif', 'Y')->get();
        $kategori = Insiden_kategori::where('aktif', 'Y')->get();
        $jenis = Insiden_jenis::where('aktif', 'Y')->get();
        $insiden_penanggung_biaya = Insiden_penanggung_biaya::where('aktif', 'Y')->get();

        return view('livewire.user.insiden-medis.insiden-medis-edit', [
            "data" => $data,
            "ruangan" => $ruangan,
            "kategori" => $kategori,
            "penanggung_biaya" => $insiden_penanggung_biaya,
            "jenis" => $jenis
        ])->layout('layouts.main');
    }
}
