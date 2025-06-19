<?php

namespace App\Http\Livewire\User\Purchasing;

use App\Models\Transaksi\Portal_request;
use Livewire\Component;

class PortalLogDataRequest extends Component
{
    public $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '', $portal_status_id = '', $diskon, $src;

    public function render()
    {
        $data = Portal_request::where('non_purchasing', 'N')->orderby('id', 'desc')->limit(250)->paginate(10);
        $this->nomor_pr = maxnopr();

        if (strlen($this->src) > 2) {
            $data = Portal_request::where('non_purchasing', 'N')->where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->paginate(10);
        }
        return view('livewire.user.purchasing.portal-log-data-request', [
            "no" => 1,
            "data" => $data
        ])->layout('layouts.main');
    }
}