<?php

namespace App\Http\Livewire\User\Purchasing;

use App\Models\Transaksi\Portal_request;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class PortalRequestList extends Component
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


    public function store()
    {
        $this->validate([
            'description' => 'required',

        ]);

        try {

            // update diskon dan ppn
            // update data 

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

    public function posting()
    {
    }

    public function history($id)
    {
        return redirect()->to('portal-user-request-history/' . $id);
    }
    public function edit($id)
    {
        return redirect()->to('portal-user-request-detail/' . $id);
    }

    public function lanjut($id)
    {
        return redirect()->to('portal-user-request-list-edit/' . $id);
    }


    public function kembali()
    {
        $this->modeAdd = false;
    }
    public function render()
    {
        $data = Portal_request::where('non_purchasing', 'N')->orderby('id', 'desc')->limit(250)->paginate(10);
        $this->nomor_pr = maxnopr();

        if (strlen($this->src) > 2) {
            $data = Portal_request::where('non_purchasing', 'N')->where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->paginate(10);
        }

        return view('livewire.user.purchasing.portal-request-list', [
            "no" => 1,
            "data" => $data
        ])->layout('layouts.main');
    }
}