<?php

namespace App\Http\Livewire\User\Requestor;

use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\Transaksi\Portal_request;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class PortalRequestIndex extends Component
{

    use WithPagination;
    public $modeAdd = false;
    public $src = '', $non_purchasing;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function add()
    {
        $this->modeAdd = true;
        $this->resetPage();
        $this->non_purchasing = 'N';
    }

    public function store()
    {
        $this->validate([
            'description' => 'required',

        ]);
        try {

            $portal_unit = Portal_user_unit_level_mapping::where('users_id', auth()->user()->id)->first();
            //dd($portal_unit);
            $portal_unit_id = $portal_unit->portal_unit_id;


            Portal_request::create([
                "nomor_pr" => maxnopr(),
                "tgl_request" => date('Y-m-d'),
                "portal_vendor_id" => '1',
                "non_purchasing" => $this->non_purchasing,
                "description" => $this->description,
                "users_id" => auth()->user()->id,
                "portal_unit_id" => $portal_unit_id
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

    public function edit($id)
    {
        return redirect()->to('portal-user-request-detail/' . $id);
    }

    public function kembali()
    {
        $this->modeAdd = false;
    }

    public function render()
    {
        $data = Portal_request::where('users_id', auth()->user()->id)->orderby('id', 'desc')->paginate(10);
        $this->nomor_pr = maxnopr();


        if (strlen($this->src) > 2) {
            $data = Portal_request::where('users_id', auth()->user()->id)->where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->paginate(10);
        }

        return view('livewire.user.requestor.portal-request-index', [
            "no" => 1,
            "data" => $data
        ])->layout('layouts.main');
    }
}