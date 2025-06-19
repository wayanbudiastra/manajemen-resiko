<?php

namespace App\Http\Livewire\InsidenUnit\User;

use App\Models\Insiden\Insiden_medis_request;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class InsidenUserMedisView extends Component
{
    public $param, $param_ori, $judul_insiden, $users_id;
    public $ori, $insiden_frekuensi_id;
    public $nomor_insiden = '', $tgl_insiden = '', $insiden_ruangan_id = '', $insiden_kategori_id = '', $sudah_pernah_terjadi;
    public $tindakan_dilakukan_oleh = '', $insiden_status_id = '', $insiden_grade_id = '', $dampak = '';
    public $frekuensi = '', $score_insiden = '', $akar_masalah, $insiden_jenis_id;
    public $akar_masalah_lengkap = '', $rencana_tindak_lanjut = '', $deadline = '', $kronologi_kejadian, $tindakan_segera_dilakukan, $penyebab_langsung_insiden;


    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('dashboard-admin');
    }

    public function posting()
    {
        try {
            $this->ori = Crypt::decrypt($this->param);
            $unit = Insiden_medis_request::find($this->ori);
            $unit->update([
                "insiden_status_id" => 2
            ]);
            session()->flash('success', 'Data insiden Berhasil di posting..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function unposting()
    {
        try {
            $this->ori = Crypt::decrypt($this->param);
            $unit = Insiden_medis_request::find($this->ori);
            $unit->update([
                "insiden_status_id" => 1
            ]);
            session()->flash('success', 'Data Insiden Berhasil di unposting..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function render()
    {
        $this->ori = Crypt::decrypt($this->param);
        $data = Insiden_medis_request::find($this->ori);
        return view('livewire.insiden-unit.user.insiden-user-medis-view', [
            "data" => $data
        ])->layout('layouts.main');
    }
}
