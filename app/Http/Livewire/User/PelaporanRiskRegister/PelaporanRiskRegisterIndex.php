<?php

namespace App\Http\Livewire\User\PelaporanRiskRegister;

use App\Models\Insiden\Insiden_unit_user;
use App\Models\Risk\Risk_register_master;
use App\Models\Risk\Risk_register_pelaporan;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class PelaporanRiskRegisterIndex extends Component
{
    use WithPagination;
    public $src;
    protected $listeners = ['postingConfirmed','postingConfirmedAll','deleteConfirmed'];

    function cek_unit()
    {
        $user_unit = "";
        $user_unit = Insiden_unit_user::where('users_id', auth()->user()->id)->first();

        if ($user_unit == null) {
            dd("Akun anda belum di mapping ke unit kerja, silahkan mengubungi Tim PMKP ");
        }

        $user_unit_id = $user_unit->insiden_unit_id;
        return $user_unit_id;
    }
    public function postingConfirmedAll()
    {
        try {
            $user_unit_id = $this->cek_unit();
            $counter = Risk_register_pelaporan::where('unit_id', $user_unit_id)->where('posting', 'N')->count();
            $data = Risk_register_pelaporan::where('unit_id', $user_unit_id)->where('posting', 'N')->update(['posting' => 'Y']);

            session()->flash('success', 'Sebanyak ' . $data . ' Data Berhasil di posting....');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function validasi($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('risk-register-pelaporan-validasi/' . $idx);
    }

    public function deleteConfirmed($id)
    {

        try {
            $data = Risk_register_pelaporan::find($id);
            $data->delete();
            session()->flash('success', 'Data Berhasil di hapus....');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        
    }

    

public function postingConfirmed($id)
{
    // $this->posting($id); // atau langsung isi logika posting di sini
     try {

            $data = Risk_register_pelaporan::find($id);
            $data->update([
                "posting" => "Y"
            ]);

            session()->flash('success',  'Data Berhasil di posting....');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
}
    public function posting($id)
    {
        try {

            $data = Risk_register_pelaporan::find($id);
            $data->update([
                "posting" => "Y"
            ]);

            session()->flash('success',  'Data Berhasil di posting....');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function generate_report()
    {
        $user_unit = "";
        $user_unit = Insiden_unit_user::where('users_id', auth()->user()->id)->first();

        if ($user_unit == null) {
            dd("Akun anda belum di mapping ke unit kerja, silahkan mengubungi Tim PMKP ");
        }

        $user_unit_id = $this->cek_unit();
        $data = Risk_register_master::where('unit_id', $user_unit_id)->where('aktif', 'Y')->get();
        // dd($data);

        try {
            $insert_data = [];
            $counter = 0;
            foreach ($data as $item) {
                $validasi = Risk_register_pelaporan::where('periode_laporan', get_periode())->where('risk_register_master_id', $item->id)->count();
                //cek supaya tidak terjadi double laporan dalam 1 periode
                if ($validasi == 0) {
                    array_push(
                        $insert_data,
                        [
                            'periode_laporan' => get_periode(),
                            'unit_id' => $user_unit_id,
                            'users_id' => auth()->user()->id,
                            'risk_register_master_id' => $item->id,
                            'aktivitas_kerja' => $item->aktivitas_kerja,
                            'pengendalian_saat_ini' => $item->pengendalian_saat_ini,
                            'resiko' => $item->resiko,
                            'efek_resiko' => $item->efek_resiko,
                            'risk_kategori_id' => $item->risk_kategori_id,
                            'risk_evaluasi_id' => $item->risk_evaluasi_id,
                            'akar_masalah' => $item->akar_masalah,
                            'rencana_tindak_lanjut' => $item->rencana_tindak_lanjut,
                            'laporan_singkat' => $item->laporan_singkat,
                            'penanggung_jawab' => $item->penanggung_jawab,
                            'target_waktu' => $item->target_waktu,
                            'matrik_kontrol_f' => $item->matrik_kontrol_f,
                            'matrik_kontrol_d' => $item->matrik_kontrol_d,
                            'matrik_kontrol_rpn' => $item->matrik_kontrol_rpn,
                            'matrik_kontrol_grade' => $item->matrik_kontrol_grade,
                            'matrik_monitoring_d' => $item->matrik_monitoring_d,
                            'matrik_monitoring_f' => $item->matrik_monitoring_f,
                            'matrik_monitoring_rpn' => $item->matrik_monitoring_rpn,
                            'matrik_monitoring_grade' => $item->matrik_monitoring_grade,
                            'tgl_deadline' => $item->tgl_deadline,
                            'posting' => "N",
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d'),
                        ]
                    );
                    $counter++;
                }
            }
            Risk_register_pelaporan::insert($insert_data);
            //dd($insert_data);
            session()->flash('success', 'Sebanyak ' . $counter . ' Data Berhasil di ditambahkan....');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function render()
    {
       

        $data = Risk_register_pelaporan::where('unit_id', $this->cek_unit())->orderby('id', 'desc')->limit(150)->paginate(15);

         if (strlen($this->src) > 1) {
                $data = Risk_register_pelaporan::where("aktivitas_kerja", "like", "%{$this->src}%")->where('unit_id', $this->cek_unit())->orderby('id', 'desc')->limit(150)->paginate(15);
        }

        return view('livewire.user.pelaporan-risk-register.pelaporan-risk-register-index', [
            "no" => 1,
            "data" => $data,
        ])->layout('layouts.main');
    }
}
