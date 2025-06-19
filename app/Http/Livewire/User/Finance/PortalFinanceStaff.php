<?php

namespace App\Http\Livewire\User\Finance;

use App\Models\Transaksi\Portal_request;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class PortalFinanceStaff extends Component
{
    use WithPagination;
    public $modeAdd = false;
    public $src = '';
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function store()
    {
        $this->validate([
            'description' => 'required',
        ]);

        try {

            Portal_request::create([
                "nomor_pr" => $this->nomor_pr,
                "tgl_request" => date('Y-m-d'),
                "portal_vendor_id" => '1',
                "description" => $this->description,
                "users_id" => auth()->user()->id
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->modeAdd = false;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }


    public function history($id)
    {
        return redirect()->to('portal-user-request-history/' . $id);
    }

    public function lanjut($id)
    {
        return redirect()->to('portal-request-finance-staff-detail/' . $id);
    }



    public function render()
    {
        $data = Portal_request::where('non_purchasing', 'Y')->orderby('id', 'desc')->limit(250)->paginate(10);
        $this->nomor_pr = maxnopr();

        if (strlen($this->src) > 2) {
            $data = Portal_request::where('non_purchasing', 'Y')->where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->paginate(10);
        }

        return view('livewire.user.finance.portal-finance-staff', [
            "no" => 1,
            "data" => $data
        ])->layout('layouts.main');
    }
}