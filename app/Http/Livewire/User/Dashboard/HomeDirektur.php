<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_proses;
use Exception;
use Livewire\Component;

class HomeDirektur extends Component
{
    public $portal_draf, $portal_inproses, $portal_reject, $portal_history;
    public function render()
    {
        try {
            $portal = Portal_request::all();
            $counter_draf = 0;
            $counter_finis = 0;
            $counter_reject = 0;
            $history_count = 0;
            foreach ($portal as $item) {
                $history_count = $history_count + 1;
                $cek_progres = Portal_request_proses::where('portal_request_id', $item->id)->get();
                if ($cek_progres->count() == 0) {
                    $counter_draf = $counter_draf + 1;
                }
                $cek_finis = Portal_request_proses::where('portal_request_id', $item->id)
                    ->where('portal_status_id', '5')->where('portal_level_id', '5')->get();
                if ($cek_finis->count() > 0) {
                    $counter_finis = $counter_finis + 1;
                }

                $cek_reject = Portal_request_proses::where('portal_request_id', $item->id)
                    ->where('portal_status_id', '4')->get();
                if ($cek_reject->count() > 0) {
                    $counter_reject = $counter_reject + 1;
                }
            }
            //dd($portal);
            $this->portal_draf = $counter_draf;

            // dd($data_reject);
            $this->portal_reject = $counter_reject;


            $this->portal_history = $counter_finis;

            $this->portal_inproses = $history_count - $counter_finis - $counter_reject;

            // dd($counter_finis);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        return view('livewire.user.dashboard.home-direktur')->layout('layouts.main');
    }
}