<?php

namespace App\Http\Livewire\User\Purchasing;

use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\Transaksi\Portal_request;
use Livewire\Component;

class PortalRekapDataDetail extends Component
{
    public $param;
    public $data = [];

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function detail($id)
    {
        // $data = Portal_request::find($id);
        // dd($data);
        return redirect()->to('cetak-portal/' . $id);
    }

    public function ganti_vendor($id)
    {
        return redirect()->to('portal-user-request-ganti-vendor/' . $id);
    } 
    
    public function render()
    {
        $data_user = Portal_user_unit_level_mapping::where('portal_unit_id', $this->param)->get();
        $insert_user = [];
        foreach ($data_user as $item) {
            array_push($insert_user, [$item->users_id]);
        }

        //dd($insert_user);
        if (cek_level_purchasing(auth()->user()->id) == 'Y') {
            $portal = Portal_request::whereIn('users_id',  $insert_user)->where('non_purchasing', 'N')->orderby('id', 'desc')->get();
        } else {
            $portal = Portal_request::whereIn('users_id',  $insert_user)->orderby('id', 'desc')->get();
        }

        $rekap = [];
        foreach ($portal as $item) {
            array_push($rekap, [
                "id" => $item->id,
                "nomor_pr" => $item->nomor_pr,
                "tgl_request" => $item->tgl_request,
                "portal_vendor_id" => $item->portal_vendor_id,
                "description" => $item->description,
                "sub_total" => $item->sub_total,
                "diskon" => $item->diskon,
                "ppn" => $item->ppn,
                "non_purchasing" => $item->non_purchasing,
                "grand_total" => $item->grand_total,
                "users_id" => $item->users_id,
                "portal_unit_id" => $item->portal_unit_id,
                "updated_at" => $item->updated_at,
            ]);
        }
        //dd($rekap);

        return view('livewire.user.purchasing.portal-rekap-data-detail', [
            "no" => 1,
            "rekap" => $rekap
        ])->layout('layouts.main');
    }
}