<?php

namespace App\Http\Livewire\User\Requestor;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_detail;
use App\Models\Transaksi\Portal_request_kategori;
use Livewire\Component;

class PortalRequestorRekapDetail extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('portal-user-request-rekap');
    }

    public function render()
    {
        $data = Portal_request::find($this->param);
        $this->nomor_pr = $data->nomor_pr;
        $this->tgl_request = tgl_indo($data->tgl_request);
        $this->nama_vendor = $data->portal_vendor->nama_vendor;
        $this->description = $data->description;
        $this->grand_total = $data->grand_total;
        $portal_request_kategori = Portal_request_kategori::where('aktif', 'Y')->get();
        $data_detail = Portal_request_detail::where('portal_request_id', $this->param)->get();
        return view('livewire.user.requestor.portal-requestor-rekap-detail', [
            "no" => 1,
            "data" => $data,
            "data_detail" => $data_detail,
            "portal_request_kategori" => $portal_request_kategori,
        ])->layout('layouts.main');
    }
}