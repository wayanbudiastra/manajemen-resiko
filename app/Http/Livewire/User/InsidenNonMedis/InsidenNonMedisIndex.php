<?php

namespace App\Http\Livewire\User\InsidenNonMedis;

use App\Models\Insiden\Insiden_jenis;

use App\Models\Insiden\Insiden_kategori;
use App\Models\Insiden\Insiden_kategori_nonmedis;
use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_rekap_user;
use App\Models\Insiden\Insiden_ruangan;
use App\Models\Insiden\Insiden_unit_terkait_nonmedis;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class InsidenNonMedisIndex extends Component
{
    use WithPagination;
    public $modeAdd = false;
    public $src = '', $judul_insiden;
    public $nomor_insiden = '', $tgl_insiden = '', $insiden_ruangan_id = '', $insiden_katagori_id = '', $sudah_pernah_terjadi;
    public $tindakan_dilakukan_oleh = '', $insiden_status_id = '', $insiden_grade_id = '', $dampak = '';
    public $frekuensi = '', $score_insiden = '', $penyeban_langsung_insiden = '', $akar_masalah = '', $insiden_jenis_id;
    public $akar_masalah_lengkap = '', $rencana_tindak_lanjut = '', $deadline = '', $kronologi_kejadian, $tindakan_segera_dilakukan;

    public function add()
    {
        $this->modeAdd = true;
    }

    public function hapus($id)
    {
        try {
            $data = Insiden_nonmedis_request::find($id);
           $data->delete();
           
            session()->flash('success', 'Data Berhasil di hapus..');
            
           
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function add_unit_terkait($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-unit/' . $idx);
    }
    public function add_kategori($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-kategori/' . $idx);
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
        //
        try {
            $data = Insiden_nonmedis_request::create([
                "nomor_insiden" => maxno_nonmedis(),
                "judul_insiden" => $this->judul_insiden,
                "tgl_insiden" => $this->tgl_insiden,
                "insiden_ruangan_id" => $this->insiden_ruangan_id,
                "insiden_kategori_id" => 1,
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
                $konter = $user_rekap->insiden_nonmedis + 1;
                $total = $konter + $user_rekap->insiden_medis;
                $user_rekap->update(['insiden_nonmedis'=> $konter,
                "insiden_total_data"=> $total,
                ]);
            }else{
                Insiden_rekap_user::create([
                    "users_id"=>auth()->user()->id,
                    "tahun"=> $tahun,
                    "insiden_medis"=>0,
                    "insiden_nonmedis"=>1,
                    "insiden_total_data"=>1,                 
                ]);
            }
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->modeAdd = false;
            $idx = Crypt::encrypt($data->id);
            return redirect()->to('insiden-non-medis-lanjut/' . $idx);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function lanjut($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-lanjut/' . $idx);
    }

    public function edit($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-edit/' . $idx);
    }

    public function view($id)
    {
        $idx = Crypt::encrypt($id);
        return redirect()->to('insiden-non-medis-view/' . $idx);
    }


    public function hapus_unit($id)
    {
        try {
            $unit = Insiden_unit_terkait_nonmedis::find($id);
            $unit->delete();
            session()->flash('success', 'Data unit Berhasil di hapus..');
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function hapus_kategori($id)
    {
        try {
            $unit = Insiden_kategori_nonmedis::find($id);
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
            $data = Insiden_nonmedis_request::where('users_id', auth()->user()->id)->orderby('id', 'desc')->paginate(10);
        } catch (Exception $e) {
            $ruangan = [];
            $katagori = [];
            $jenis = [];
            $data = [];
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.user.insiden-non-medis.insiden-non-medis-index', [
            "data" => $data,
            "ruangan" => $ruangan,
            "katagori" => $katagori,
            "jenis" => $jenis,
            "no" => 1
        ])->layout('layouts.main');
    }
}
