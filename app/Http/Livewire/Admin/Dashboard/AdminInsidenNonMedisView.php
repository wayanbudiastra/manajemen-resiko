<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Insiden\Insiden_nonmedis_request;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class AdminInsidenNonMedisView extends Component
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
            $unit = Insiden_nonmedis_request::find($this->ori);
            $unit->update([
                "insiden_status_id" => 4
            ]);
            session()->flash('success', 'Data insiden Berhasil di posting..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function cencel(){

        try {
            $this->ori = Crypt::decrypt($this->param);
            $unit = Insiden_nonmedis_request::find($this->ori);
            $unit->update([
                "insiden_status_id" => 5
            ]);

            session()->flash('success', 'Data insiden Berhasil di batalkan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function pending()
    {
        try {
            $this->ori = Crypt::decrypt($this->param);
            $unit = Insiden_nonmedis_request::find($this->ori);
            $unit->update([
                "insiden_status_id" => 3
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
            $unit = Insiden_nonmedis_request::find($this->ori);
            $unit->update([
                "insiden_status_id" => 1
            ]);

            session()->flash('success', 'Data insiden Berhasil di unposting..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function render()
    {
        $this->ori = Crypt::decrypt($this->param);
        $data = Insiden_nonmedis_request::find($this->ori);
        return view('livewire.admin.dashboard.admin-insiden-non-medis-view', [
            "data" => $data
        ])->layout('layouts.main-admin');
    }
}
