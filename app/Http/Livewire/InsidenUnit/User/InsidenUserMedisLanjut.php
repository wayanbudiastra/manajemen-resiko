<?php

namespace App\Http\Livewire\InsidenUnit\User;

use App\Models\Insiden\Insiden_dampak;
use App\Models\Insiden\Insiden_frekuensi;
use App\Models\Insiden\Insiden_grade;
use App\Models\Insiden\Insiden_jenis;
use App\Models\Insiden\Insiden_kategori;
use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_ruangan;
use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_user;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenUserMedisLanjut extends Component
{
    public $param, $param_ori, $judul_insiden, $users_id;
    public $ori, $insiden_frekuensi_id, $pic_insiden_users_id;
    public $nomor_insiden = '', $tgl_insiden = '', $insiden_ruangan_id = '', $insiden_kategori_id = '', $sudah_pernah_terjadi;
    public $tindakan_dilakukan_oleh = '', $insiden_status_id = '', $insiden_grade_id = '', $insiden_dampak_id = '';
    public $frekuensi = '', $score_insiden = '', $akar_masalah, $insiden_jenis_id;
    public $akar_masalah_lengkap = '', $rencana_tindak_lanjut = '', $deadline = '', $kronologi_kejadian, $tindakan_segera_dilakukan, $penyebab_langsung_insiden;

    public $inisial_pasien, $umur, $jenis_kelamin, $insiden_penanggung_biaya_id, $tgl_masuk_rs;


    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('insiden-user-pic-index');
    }

    public function store()
    {
        $this->validate([
            'insiden_dampak_id' => 'required',
            'insiden_frekuensi_id' => 'required',
            'score_insiden' => 'required|numeric',
            'akar_masalah' => 'required',
            'akar_masalah_lengkap' => 'required',
            'rencana_tindak_lanjut' => 'required',
            'deadline' => 'required',
            "pic_insiden_users_id" => 'required'

        ]);
        try {
            $idx = Crypt::decrypt($this->param);
            $insiden_non_medis = Insiden_medis_request::find($idx);
            $insiden_non_medis->update([
                "insiden_dampak_id" => $this->insiden_dampak_id,
                "insiden_frekuensi_id" => $this->insiden_frekuensi_id,
                "score_insiden" => $this->score_insiden,
                // "penyebab_langsung_insiden" => $this->penyebab_langsung_insiden,
                "akar_masalah" => $this->akar_masalah,
                "akar_masalah_lengkap" => $this->akar_masalah_lengkap,
                "rencana_tindak_lanjut" => $this->rencana_tindak_lanjut,
                "deadline" => $this->deadline,
                "pic_insiden_users_id" => $this->pic_insiden_users_id
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
        //dd($data);
        $this->nomor_insiden = $data->nomor_insiden;
        $this->judul_insiden = $data->judul_insiden;
        $this->tgl_insiden = $data->tgl_insiden;
        $this->insiden_ruangan_id = $data->insiden_ruangan_id;
        $this->insiden_kategori_id = $data->insiden_kategori_id;
        $this->tindakan_dilakukan_oleh = $data->tindakan_dilakukan_oleh;
        $this->kronologi_kejadian = $data->kronologi_kejadian;
        $this->sudah_pernah_terjadi = $data->sudah_pernah_terjadi;
        $this->tindakan_segera_dilakukan = $data->tindakan_segera_dilakukan;

        $this->insiden_status_id = $data->insiden_status_id;
        $this->insiden_grade_id = $data->insiden_grade_id;
        $this->penyebab_langsung_insiden = $data->penyebab_langsung_insiden;
        $this->insiden_dampak_id = $data->insiden_dampak_id;
        $this->insiden_frekuensi_id = $data->insiden_frekuensi_id;
        $this->score_insiden = $data->score_insiden;
        $this->akar_masalah = $data->akar_masalah;
        $this->akar_masalah_lengkap = $data->akar_masalah_lengkap;
        $this->rencana_tindak_lanjut = $data->rencana_tindak_lanjut;
        $this->deadline = $data->deadline;
        $this->insiden_jenis_id = $data->insiden_jenis_id;
        $this->users_id = $data->users_id;
        $this->pic_insiden_users_id = $data->pic_insiden_users_id;

        $ruangan = Insiden_ruangan::where('aktif', 'Y')->get();
        //
        $kategori = Insiden_kategori::where('aktif', 'Y')->get();

        $jenis = Insiden_jenis::where('aktif', 'Y')->get();

        $grade = Insiden_grade::where('aktif', 'Y')->get();

        $frekuensi = Insiden_frekuensi::where('aktif', 'Y')->get();

        $dampak = Insiden_dampak::where('aktif', 'Y')->get();


        $data_unit = Insiden_unit::whereDoesntHave('insiden_unit_terkait_medis', function ($query) {
            return $query->where('insiden_medis_request_id', $this->ori);
        })->get(); // data unit yang belum di maping 

        $user_pic = Insiden_unit_user::where('insiden_level_id', '2')->orWhere('insiden_level_id', '3')->get();


        $data_kategori = Insiden_kategori::whereDoesntHave('insiden_kategori_medis', function ($query) {
            return $query->where('insiden_medis_request_id', $this->ori);
        })->get(); // data kategori yang belum di maping 
        return view('livewire.insiden-unit.user.insiden-user-medis-lanjut', [
            "ruangan" => $ruangan,
            "kategori" => $kategori,
            "jenis" => $jenis,
            "unit" => $data_unit,
            "grade" => $grade,
            "data" => $data,
            "dampak" => $dampak,
            "user_pic" => $user_pic,
            "data_kategori" => $data_kategori,
            "data_frekuensi" => $frekuensi
        ])->layout('layouts.admin');
    }
}
