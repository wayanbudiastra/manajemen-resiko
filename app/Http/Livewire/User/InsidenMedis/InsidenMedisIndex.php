<?php

namespace App\Http\Livewire\User\InsidenMedis;

use App\Models\Insiden\Insiden_jenis;
use App\Models\Insiden\Insiden_kategori;
use App\Models\Insiden\Insiden_kategori_medis;
use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_penanggung_biaya;
use App\Models\Insiden\Insiden_rekap_user;
use App\Models\Insiden\Insiden_ruangan;
use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_terkait_medis;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenMedisIndex extends Component
{
    use WithPagination;
    public $modeAdd = false;
    public $src = '', $judul_insiden;
    public $nomor_insiden = '', $tgl_insiden = '', $insiden_ruangan_id = '', $insiden_katagori_id = '', $sudah_pernah_terjadi;
    public $tindakan_dilakukan_oleh = '', $insiden_status_id = '', $insiden_grade_id = '', $dampak = '';
    public $frekuensi = '', $score_insiden = '', $penyeban_langsung_insiden = '', $akar_masalah = '', $insiden_jenis_id;
    public $akar_masalah_lengkap = '', $rencana_tindak_lanjut = '', $deadline = '', $kronologi_kejadian, $tindakan_segera_dilakukan;
    public $inisial_pasien, $umur, $jenis_kelamin, $insiden_penanggung_biaya_id, $tgl_masuk_rs;

    public function add()
    {
        $this->modeAdd = true;
    }

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function hapus($id)
    {
        try {
            $data = Insiden_medis_request::find($id);
           // dd($data);
            $data->delete();
            $unit_terkait = Insiden_unit_terkait_medis::where('insiden_medis_request_id',$id)->get();
            foreach($unit_terkait as $d){
                $unit= Insiden_unit_terkait_medis::find($d->id);
                if($unit)
                {
                    $unit->delete();
                }
            }

            $katagori = Insiden_kategori_medis::where('insiden_medis_request_id',$id)->get();
            foreach($unit_terkait as $d){
                $unit= Insiden_unit_terkait_medis::find($d->id);
                if($unit)
                {
                    $unit->delete();
                }
            }
            
            session()->flash('success', 'Data Berhasil di hapus..');
            
          
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function store()
    {
        $this->validate([
            'judul_insiden' => 'required',
            'tgl_insiden' => 'required',
            'inisial_pasien' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'insiden_penanggung_biaya_id' => 'required',
            'tgl_masuk_rs' => 'required',
            'tindakan_dilakukan_oleh' => 'required',
            'kronologi_kejadian' => 'required',
            'tindakan_segera_dilakukan' => 'required',
            'insiden_jenis_id' => 'required',
            'sudah_pernah_terjadi' => 'required'
        ]);
        //
        try {
            $data = Insiden_medis_request::create([
                "nomor_insiden" => maxno_medis(),
                "judul_insiden" => $this->judul_insiden,
                "tgl_insiden" => $this->tgl_insiden,
                "insiden_ruangan_id" => $this->insiden_ruangan_id,

                'inisial_pasien' => $this->inisial_pasien,
                'umur' => $this->umur,
                'jenis_kelamin' => $this->jenis_kelamin,
                'insiden_penanggung_biaya_id' => $this->insiden_penanggung_biaya_id,
                'tgl_masuk_rs' => $this->tgl_masuk_rs,
                "tindakan_dilakukan_oleh" => $this->tindakan_dilakukan_oleh,
                "kronologi_kejadian" => $this->kronologi_kejadian,
                "tindakan_segera_dilakukan" => $this->tindakan_segera_dilakukan,
                "sudah_pernah_terjadi" => $this->sudah_pernah_terjadi,
                "insiden_jenis_id" => $this->insiden_jenis_id,
                "insiden_status_id" => 1,
                "insiden_grade_id" => 1,
                "insiden_frekuensi_id" => 5,
                "deadline" => date('Y-m-d'),
                "users_id" => auth()->user()->id
            ]);

            $tahun = date("Y");
            $user_rekap = Insiden_rekap_user::where('tahun',$tahun)->where('users_id',auth()->user()->id)->first();
            if($user_rekap){
                $konter = $user_rekap->insiden_medis + 1;
                $total = $konter + $user_rekap->insiden_nonmedis;
                $user_rekap->update(['insiden_medis'=> $konter,
                "insiden_total_data"=> $total,
                ]);
            }else{
                Insiden_rekap_user::create([
                    "users_id"=>auth()->user()->id,
                    "tahun"=>$tahun,
                    "insiden_medis"=>1,
                    "insiden_nonmedis"=>0,
                    "insiden_total_data"=>1,                 
                ]);
            }

            session()->flash('success', 'Data Berhasil di simpan..');
            $this->modeAdd = false;
            $idx = Crypt::encrypt($data->id);
            return redirect()->to('insiden-medis-lanjut/' . $idx);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function lanjut($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-lanjut/' . $idx);
    }

    public function add_unit_terkait($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-unit/' . $idx);
    }
    public function add_kategori($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-kategori/' . $idx);
    }

    public function edit($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-edit/' . $idx);
    }

    public function view($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-medis-view/' . $idx);
    }



    public function hapus_unit($id)
    {
        try {
            $unit = Insiden_unit_terkait_medis::find($id);
            $unit->delete();
            session()->flash('success', 'Data unit Berhasil di hapus..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function hapus_kategori($id)
    {
        try {
            $unit = Insiden_kategori_medis::find($id);
            $unit->delete();
            session()->flash('success', 'Data Kategori Berhasil di hapus..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function kembali()
    {
        $this->modeAdd = false;
    }


    public function render()
    {
        try {
            $ruangan = Insiden_ruangan::where('aktif', 'Y')->get();
            //
            $katagori = Insiden_kategori::where('aktif', 'Y')->get();
            //
            $jenis = Insiden_jenis::where('aktif', 'Y')->get();
            //
            $insiden_penanggung_biaya = Insiden_penanggung_biaya::where('aktif', 'Y')->get();

            $data = Insiden_medis_request::where('users_id', auth()->user()->id)->orderby('id', 'desc')->paginate(10);
        } catch (Exception $e) {
            $ruangan = [];
            $katagori = [];
            $jenis = [];
            $data = [];
            $insiden_penanggung_biaya = [];
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        return view('livewire.user.insiden-medis.insiden-medis-index', [
            "data" => $data,
            "ruangan" => $ruangan,
            "katagori" => $katagori,
            "jenis" => $jenis,
            "penanggung_biaya" => $insiden_penanggung_biaya,
            "no" => 1
        ])->layout('layouts.main');
    }
}
