<?php

namespace App\Http\Livewire\User\Kabid;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_proses;
use Exception;
use Livewire\Component;

class PortalKabidListHistory extends Component
{
    public $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '', $grand_total;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('portal-request-kabid-list');
    }

    public function render()
    {
        try {
            $data = Portal_request::find($this->param);
            $this->nomor_pr = $data->nomor_pr;
            $this->tgl_request = tgl_indo($data->tgl_request);
            $this->nama_vendor = $data->portal_vendor->nama_vendor;
            $this->description = $data->description;
            $this->grand_total = $data->grand_total;
            $data_history = Portal_request_proses::where('portal_request_id', $this->param)->orderby('id', 'asc')->get();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
        return view('livewire.user.kabid.portal-kabid-list-history', [
            "data" => $data,
            "no" => 1,
            "data_history" => $data_history
        ])->layout('layouts.main');
    }
}