<?php

namespace App\Http\Livewire\User\Requestor;

use App\Models\Admin\Portal_vendor;
use App\Models\Transaksi\Portal_request;
use Exception;
use Livewire\Component;

class PortalRequestGantiVendor extends Component
{
    public $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';
    protected $listeners = ['listenerReferenceHere'];
    public function mount($param = null)
    {
        $this->param = $param;
    }
    public function hydrate()
    {
        $this->emit('select2');
    }
    public function listenerReferenceHere($selectedValue)
    {
        //Do something with the selected2's selected value here
        $this->portal_vendor_id = $selectedValue;
    }


    public function kembali()
    {
        return redirect()->to('/portal-user-request-detail/' . $this->param);
    }

    public function store()
    {

        $this->validate([
            'portal_vendor_id' => 'required',
        ]);
        try {

            $request = Portal_request::find($this->param);
            $request->update([
                'portal_vendor_id' => $this->portal_vendor_id
            ]);
            session()->flash('success', 'Data Berhasil di update..');

            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }

    public function render()
    {
        $data = Portal_request::find($this->param);
        // dd($data);
        $this->nomor_pr = $data->nomor_pr;
        $this->tgl_request = tgl_indo($data->tgl_request);
        //  $this->portal_vendor_id = $data->portal_vendor_id;
        $this->description = $data->description;
        if ($data->non_purchasing == 'N') {
            $portal_vendor = Portal_vendor::where('aktif', 'Y')->where('vendor_purchasing', 'Y')->get();
        } else {
            $portal_vendor = Portal_vendor::where('aktif', 'Y')->where('vendor_purchasing', 'N')->get();
        }


        return view('livewire.user.requestor.portal-request-ganti-vendor', [
            "portal_vendor" => $portal_vendor
        ])->layout('layouts.main');
    }
}