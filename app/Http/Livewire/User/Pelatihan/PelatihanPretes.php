<?php

namespace App\Http\Livewire\User\Pelatihan;

use App\Models\Admin\Pelatihan;
use App\Models\Admin\Pelatihan_soal;
use App\Models\Admin\Pelatihan_user;
use App\Models\Admin\Pelatihan_user_log;
use App\Models\Admin\Pelatihan_user_log_soal;
use Exception;
use Livewire\Component;

class PelatihanPretes extends Component
{
    public $param;
    public $status_materi, $status_pretes, $status_postes;
    public $soal_id = [];
    public $jawabanSelected = [];


    public function kembali()
    {
        return redirect()->to('/pelatihan-user-detail/' . $this->param);
    }

    public function mount($param = null)
    {
        $this->param = $param;
        // $this->jawabanSelected = collect();
    }

    public function store()
    {
        // valiadasi array belum di buat
        $cek_limit = Pelatihan_user_log::where('pelatihan_user_id', $this->param)->where('kegiatan_id', '1')->max('no_limit');
        try {
            $log = new Pelatihan_user_log();
            $log->pelatihan_user_id = $this->param;
            $log->kegiatan_id = "1";
            $log->no_limit = $cek_limit + 1;
            $log->hasil = 0;
            $log->keterangan = "Pretes ke " . $cek_limit + 1;
            $log->save();
            //dd($log);
            $hasil_tes = 0;
            foreach ($this->jawabanSelected as $key => $data) {
                // key adalah id master data soal
                $bobot = 0;
                $lulus = "N";
                $hasil_jawaban = cek_kunci_jawaban($key, $data['jawaban']);
                $kunci_jawaban = get_kunci_jawaban($key);
                if ($hasil_jawaban == 'true') {
                    $bobot = cek_bobot($key);
                    $lulus = "Y";
                }
                Pelatihan_user_log_soal::create([
                    'pelatihan_user_log_id' => $log->id,
                    'jawaban' => $data['jawaban'],
                    'pelatihan_soal_id' => $key,
                    'kunci_jawaban' => $kunci_jawaban,
                    "bobot" => $bobot,
                    'lulus' => $lulus
                ]);
                $hasil_tes = $hasil_tes + $bobot;
            }
            $data_log = Pelatihan_user_log::find($log->id);
            $data_log->update([
                "hasil" => $hasil_tes
            ]);
            //echo "<br>hasil = " . $total_bobot;
            session()->flash('success', 'Pelatihan sudah berhasil di proses..');
            // dd($hasil_jawaban);
            return redirect()->to('/pelatihan-user-pretes-hasil/' . $log->id);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function render()
    {
        $data = Pelatihan_user::find($this->param);
        $this->nama_pelatihan = $data->pelatihan->nama_pelatihan;
        $this->jenis_pelatihan = $data->pelatihan->kelas_jenis->nama_kelas_jenis;
        $this->pelatihan_skill = $data->pelatihan->kelas_skill->nama_kelas_skill;
        $this->total_jam = $data->pelatihan->total_jam;
        $this->keterangan = $data->pelatihan->keterangan;
        $this->subpelatihan = $data->pelatihan->subpelatihan;
        $this->limit_akses = $data->pelatihan->limit_akses;
        $this->total_bobot = $data->pelatihan->total_bobot;
        $this->kelulusan = $data->pelatihan->kelulusan;


        $cek_random = $data->pelatihan->random_soal;
        if ($cek_random == 'Y') {
            $soal = Pelatihan_soal::where('pelatihan_id', $data->pelatihan_id)->where('aktif', 'Y')->inRandomOrder()->get();
        } else {
            $soal = Pelatihan_soal::where('pelatihan_id', $data->pelatihan_id)->where('aktif', 'Y')->get();
        }
        $data_soal = [];
        foreach ($soal as $item) {
            array_push($data_soal, ['jawaban' => "", 'pelatihan_soal_id' => $item->id, 'kunci_jawaban' => $item->kunci_jawaban, 'bobot' => $item->bobot]);
        }


        // $this->jawabanSelected = $data_soal;

        return view('livewire.user.pelatihan.pelatihan-pretes', [
            "no" => 1,
            "data" => $data,
            "soal" => $soal
        ])->layout('layouts.main');
    }
}