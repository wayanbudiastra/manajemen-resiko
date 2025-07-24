<?php

namespace App\Http\Livewire\User\ProfilResiko;

use App\Models\Insiden\Insiden_unit_user;
use App\Models\Risk\Risk_evaluasi;
use App\Models\Risk\Risk_kategori;
use App\Models\Risk\Risk_register_master;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class ProfilResikoIndex extends Component
{
    use WithPagination;
    public $modeAdd = false;
    public $src = '', $user_unit = '', $unit_id = '', $resiko = '', $efek_resiko = '', $target_waktu = '', $tgl_deadline;
    public $aktivitas_kerja = '', $pengendalian_saat_ini = '', $risk_kategori_id = '',  $risk_evaluasi_id;
    public $akar_masalah = '', $rencana_tindak_lanjut = '', $laporan_singkat = '', $aktif = '', $matrik_monitoring_f = '', $matrik_monitoring_d = '';
    public $matrik_kontrol_f = '', $matrik_kontrol_d = '', $penanggung_jawab = '', $matrik_evaluasi_d = '', $matrik_evaluasi_f = '';

    public function add()
    {
        $this->modeAdd = true;
    }

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function store()
    {


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
            'matrik_monitoring_d' => 'required',
            'tgl_deadline' => 'required'

        ]);
        //

        try {


            Risk_register_master::create([

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
                "matrik_kontrol_grade" => setup_grade($this->matrik_kontrol_d * $this->matrik_kontrol_f),
                "matrik_monitoring_d" => $this->matrik_monitoring_d,
                "matrik_monitoring_f" => $this->matrik_monitoring_f,
                "matrik_monitoring_rpn" => $this->matrik_monitoring_f * $this->matrik_monitoring_d,
                "matrik_monitoring_grade"=> setup_grade($this->matrik_monitoring_f * $this->matrik_monitoring_d),
                "tgl_deadline" => $this->tgl_deadline,
                "aktif" => "N",
                "unit_id" => $this->unit_id,
                "users_id" => auth()->user()->id
            ]);

            session()->flash('success', 'Data Berhasil di simpan..');
            $this->modeAdd = false;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function edit($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('risk-register-profil-edit/' . $idx);
    }

    public function grade($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('risk-register-profil-grade/' . $idx);
    }


    public function kembali()
    {
        $this->modeAdd = false;
    }


    public function panduan_grade()
    {
        return redirect()->to('risk-register-panduan-index');
    }
    public function render()
    {
        try {
            $user_unit = " ";
            $user_unit = Insiden_unit_user::where('users_id', auth()->user()->id)->first();
            if ($user_unit == null) {

                session()->flash('error', 'Unit Anda Belum di mapping Silahkan hubungi Admin PMKP...');
                //redirect()->to('/login'); // arahkan ke halaman login
            }
            $user_unit_id = $user_unit->insiden_unit_id;
            //
            $this->unit_id = $user_unit_id;
            $katagori = Risk_kategori::where('aktif', 'Y')->get();
            //
            $evaluasi = Risk_evaluasi::where('aktif', 'Y')->get();
            //
            $data = Risk_register_master::where('unit_id', $user_unit_id)->orderby('matrik_monitoring_grade', 'desc')->paginate(15);

            if (strlen($this->src) > 1) {
                $data = Risk_register_master::where("aktivitas_kerja", "like", "%{$this->src}%")->where('unit_id', $user_unit_id)->orderby('matrik_monitoring_grade', 'desc')->paginate(15);
            }
        } catch (Exception $e) {
           
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.user.profil-resiko.profil-resiko-index', [
            "data" => $data,
            "evaluasi" => $evaluasi,
            "kategori" => $katagori,
            "no" => 1
        ])->layout('layouts.main');
    }
}
