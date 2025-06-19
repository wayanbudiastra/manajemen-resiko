<?php

namespace App\Http\Livewire\User\Requestor;

use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\Transaksi\Portal_request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PortalRequestorRekap extends Component
{
    use WithPagination;
    public $src;

    public function updatingSrc()
    {
        $this->resetPage();
    }
    public function history($id)
    {
        return redirect()->to('portal-user-request-history/' . $id);
    }

    public function detail($id)
    {
        return redirect()->to('portal-user-request-rekap-detail/' . $id);
    }

    public function render()
    {
        $portal_unit = Portal_user_unit_level_mapping::where('users_id', auth()->user()->id)->first();
        //dd($portal_unit);
        $portal_unit_id = $portal_unit->portal_unit_id;

        $data = Portal_request::where('portal_unit_id', $portal_unit_id)->orderby('id', 'desc')->paginate(10);

        if (strlen($this->src) > 2) {
            $data = Portal_request::where('portal_unit_id', $portal_unit_id)->where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->paginate(10);
        }

        return view('livewire.user.requestor.portal-requestor-rekap', [
            "no" => 1,
            "data" => $data,
        ])->layout('layouts.main');
    }
}