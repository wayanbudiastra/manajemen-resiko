<?php

namespace App\Http\Livewire\User\ProfilResiko;


use App\Models\Risk\Risk_evaluasi;
use App\Models\Risk\Risk_kategori;
use App\Models\Risk\Risk_register_master;
use Exception;
use Livewire\Component;

class ProfilResikoEdit extends Component
{
    public $param = '', $user_unit = '', $unit_id = '', $resiko = '', $efek_resiko = '', $target_waktu = '';
    public $aktivitas_kerja = '', $pengendalian_saat_ini = '', $risk_kategori_id = '',  $risk_evaluasi_id;
    public $akar_masalah = '', $rencana_tindak_lanjut = '', $laporan_singkat = '', $aktif = '', $matrik_monitoring_f = '', $matrik_monitoring_d = '';
    public $matrik_kontrol_f = '', $matrik_kontrol_d = '', $penanggung_jawab = '', $matrik_evaluasi_d = '', $matrik_evaluasi_f = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('risk-register-profil-index');
    }

    public function store()
    {
        try {
            $this->validate([
                'aktivitas_kerja' => 'required',
                'resiko' => 'required',
                'efek_resiko' => 'required',
                'pengendalian_saat_ini' => 'required',
                'risk_kategori_id' => 'required',
                'matrik_kontrol_f' => 'required',
                'matrik_kontrol_d' => 'required',
                'penanggung_jawab' => 'required',
                'target_waktu' => 'required',
                'risk_evaluasi_id' => 'required',
                'akar_masalah' => 'required',
                'rencana_tindak_lanjut' => 'required',
                'matrik_monitoring_f' => 'required',
                'matrik_monitoring_d' => 'required'


            ]);
            $data = Risk_register_master::find(decrypt($this->param));
            $data->update([
                "aktivitas_kerja" => $this->aktivitas_kerja,
                "pengendalian_saat_ini" => $this->pengendalian_saat_ini,
                "resiko" => $this->resiko,
                "efek_resiko" => $this->efek_resiko,
                "risk_kategori_id" => $this->risk_kategori_id,
                'risk_evaluasi_id' => $this->risk_evaluasi_id,
                "akar_masalah" => $this->akar_masalah,
                "rencana_tindak_lanjut" => $this->rencana_tindak_lanjut,
                "laporan_singkat" => $this->laporan_singkat,
                "penanggung_jawab" => $this->penanggung_jawab,
                "target_waktu" => $this->target_waktu,
                "matrik_kontrol_f" => $this->matrik_kontrol_f,
                "matrik_kontrol_d" => $this->matrik_kontrol_d,
                "matrik_kontrol_rpn" => $this->matrik_kontrol_d * $this->matrik_kontrol_f,
                "matrik_monitoring_d" => $this->matrik_monitoring_d,
                "matrik_monitoring_f" => $this->matrik_monitoring_f,
                "matrik_monitoring_rpn" => $this->matrik_monitoring_f * $this->matrik_monitoring_d,
                "aktif" => $this->aktif
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }

    public function render()
    {
        try {
            $data = Risk_register_master::find(decrypt($this->param));
            $this->aktivitas_kerja = $data->aktivitas_kerja;
            $this->pengendalian_saat_ini = $data->pengendalian_saat_ini;
            $this->resiko = $data->resiko;
            $this->efek_resiko = $data->efek_resiko;
            $this->risk_kategori_id = $data->risk_kategori_id;
            $this->risk_evaluasi_id = $data->risk_evaluasi_id;
            $this->akar_masalah = $data->akar_masalah;
            $this->rencana_tindak_lanjut = $data->rencana_tindak_lanjut;
            $this->laporan_singkat = $data->laporan_singkat;
            $this->penanggung_jawab = $data->penanggung_jawab;
            $this->target_waktu = $data->target_waktu;
            $this->matrik_kontrol_f = $data->matrik_kontrol_f;
            $this->matrik_kontrol_d = $data->matrik_kontrol_d;
            $this->matrik_monitoring_d = $data->matrik_monitoring_d;
            $this->matrik_monitoring_f = $data->matrik_monitoring_f;
            $this->aktif = $data->aktif;

            $katagori = Risk_kategori::where('aktif', 'Y')->get();
            //
            $evaluasi = Risk_evaluasi::where('aktif', 'Y')->get();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.user.profil-resiko.profil-resiko-edit', [
            "evaluasi" => $evaluasi,
            "kategori" => $katagori,
        ])->layout('layouts.main');
    }
}
