<?php

namespace App\Http\Livewire\User\Requestor;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_detail;
use App\Models\Transaksi\Portal_request_detail_log;
use App\Models\Transaksi\Portal_request_kategori;
use Exception;
use Livewire\Component;

class PortalRequestDetailEdit extends Component
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
        return redirect()->to('portal-user-request-detail/' .  $this->portal_request_id);
    }

    public function store()
    {
        try {
            $this->validate([
                'nama_barang' => 'required',
                'portal_request_kategori_id' => 'required',
                'harga_satuan' => 'required',
                'qty' => 'required',
            ]);

            $nilai_discount = $this->discount;
            //dd($nilai_discount);
            $this->total_harga = ($this->harga_satuan - $nilai_discount) * $this->qty;
            $detail = Portal_request_detail::find($this->param);
            $detail->update([
                "portal_request_kategori_id" => $this->portal_request_kategori_id,
                "nama_barang" => $this->nama_barang,
                "harga_satuan" => $this->harga_satuan,
                "qty" => $this->qty,
                "discount" => $this->discount,
                "nilai_discount" => $nilai_discount,
                "harga_net" => $this->harga_satuan - $nilai_discount,
                "total_harga" => $this->total_harga,
                "keterangan" => $this->keterangan,
                "users_id" => auth()->user()->id
            ]);
            $portal = Portal_request::find($this->portal_request_id);
            $portal_detail = Portal_request_detail::where('portal_request_id', $this->portal_request_id)->get();

            $portal->update([
                "grand_total" => $portal_detail->sum('total_harga'),
                "sub_total" => $portal_detail->sum('total_harga')
            ]);

            Portal_request_detail_log::create([
                "portal_request_id" => $portal->id,
                "portal_request_kategori_id" => $this->portal_request_kategori_id,
                "nama_barang" => $this->nama_barang,
                "harga_satuan" => $this->harga_satuan,
                "qty" => $this->qty,
                "discount" => $this->discount,
                "nilai_discount" => $nilai_discount,
                "harga_net" => $this->harga_satuan - $nilai_discount,
                "total_harga" => $this->total_harga,
                "keterangan" => $this->keterangan,
                "users_id" => auth()->user()->id,
                'status_proses' => "update data"
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->modeAdd = false;
        }
    }

    public function render()
    {
        $data = Portal_request_detail::find($this->param);
        $this->portal_request_id = $data->portal_request_id;
        $this->portal_request_kategori_id = $data->portal_request_kategori_id;
        $this->nama_barang = $data->nama_barang;
        $this->harga_satuan = $data->harga_satuan;
        $this->qty = $data->qty;
        $this->keterangan = $data->keterangan;
        $this->discount = $data->discount;

        $portal_request_kategori = Portal_request_kategori::where('aktif', 'Y')->get();

        return view('livewire.user.requestor.portal-request-detail-edit', [
            "no" => 1,
            "data" => $data,
            "portal_request_kategori" => $portal_request_kategori,
        ])->layout('layouts.main');
    }
}