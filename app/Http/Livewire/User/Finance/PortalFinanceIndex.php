<?php

namespace App\Http\Livewire\User\Finance;

use App\Models\Transaksi\Portal_request;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PortalFinanceIndex extends Component
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
        return redirect()->to('portal-finance-list-history/' . $id);
    }


    public function lanjut($id)
    {
        return redirect()->to('portal-finance-list-detail/' . $id);
    }


    public function kembali()
    {
        $this->modeAdd = false;
    }

    public function render()
    {
        $data = Portal_request::orderby('id', 'desc')->limit(100)->get();
        // dd($data);
        if (strlen($this->src) > 2) {
            $data = Portal_request::where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->limit(100)->get();
        }
        return view('livewire.user.finance.portal-finance-index', [
            "no" => 1,
            "data" => $data
        ])->layout('layouts.main');
    }
}