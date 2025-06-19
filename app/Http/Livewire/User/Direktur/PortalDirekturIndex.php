<?php

namespace App\Http\Livewire\User\Direktur;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_proses;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class PortalDirekturIndex extends Component
{
    use WithPagination;
    public $modeAdd = false;
    public $src = '';
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';

    public function add()
    {
        $this->modeAdd = true;
    }

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function history($id)
    {
        return redirect()->to('portal-direktur-list-history/' . $id);
    }


    public function lanjut($id)
    {
        return redirect()->to('portal-direktur-list-detail/' . $id);
    }


    public function kembali()
    {
        $this->modeAdd = false;
    }

    public function render()
    {
        $data = Portal_request::orderby('id', 'desc')->paginate(10);

        $test = Portal_request_proses::where('portal_level_id', '4')->where('portal_status_id', '5')->orderby('id', 'desc')->paginate(10);

        // dd($test);

        if (strlen($this->src) > 2) {
            $test = Portal_request_proses::where('portal_level_id', '4')->where('portal_status_id', '5')
                ->with('portal_request')
                ->whereHas('portal_request', function (Builder $query) {
                    $query->where('nomor_pr', 'like', "%{$this->src}%")->orwhere('description', 'like', "%{$this->src}%");
                })->orderby('id', 'desc')->paginate(10);
            //$data = Portal_request::where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->paginate(15);
        }

        return view('livewire.user.direktur.portal-direktur-index', [
            "no" => 1,
            "data" => $data,
            "test" => $test,
        ])->layout('layouts.main');
    }
}