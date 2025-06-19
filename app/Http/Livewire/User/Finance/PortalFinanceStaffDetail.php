<?php

namespace App\Http\Livewire\User\Finance;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_detail;
use App\Models\Transaksi\Portal_request_detail_log;
use App\Models\Transaksi\Portal_request_kategori;
use Exception;
use Livewire\Component;

class PortalFinanceStaffDetail extends Component
{
    public $modeAdd = false;
    public $modeEdit = false;
    public $modeDiskon = false;
    public $src = '';
    public $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '', $diskon = 0;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('portal-request-finance-staff');
    }
    public function reset_data()
    {
        $this->nama_barang = '';
        $this->discount = 0;
        $this->total_harga = 0;
        $this->harga_satuan = 0;
        $this->qty = 1;
        $this->portal_request_kategori_id = '';
        $this->keterangan = '';
    }
    public function add()
    {
        $this->reset_data();
        $this->modeAdd = true;
        $this->modeEdit = false;
    }
    public function batal1()
    {
        $this->modeAdd = false;
        $this->reset_data();
    }
    public function edit($id)
    {
        $this->modeAdd = false;
        $this->modeEdit = true;
        $this->reset_data();
        $data = Portal_request_detail::find($id);
        $this->data_id = $data->id;
        $this->portal_request_id = $data->portal_request_id;
        $this->portal_request_kategori_id = $data->portal_request_kategori_id;
        $this->nama_barang = $data->nama_barang;
        $this->harga_satuan = $data->harga_satuan;
        $this->qty = $data->qty;
        $this->keterangan = $data->keterangan;
        $this->discount = $data->discount;
    }
    public function batal2()
    {
        $this->reset_data();
        $this->modeEdit = false;
    }

    public function batal3()
    {
        $this->reset_data();
        $this->modeDiskon = false;
    }

    public function diskon()
    {
        $data = Portal_request::find($this->param);
        $this->modeDiskon = true;
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
            $detail = Portal_request_detail::create([
                "portal_request_id" => $this->param,
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
            $portal = Portal_request::find($this->param);
            $portal_detail = Portal_request_detail::where('portal_request_id', $this->param)->get();
            $portal->update([
                "grand_total" => $portal_detail->sum('total_harga'),
                "sub_total" => $portal_detail->sum('total_harga')
            ]);

            Portal_request_detail_log::create([
                "portal_request_id" => $this->param,
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
                'status_proses' => "created data"
            ]);

            session()->flash('success', 'Data Berhasil di simpan..');
            $this->modeAdd = false;
            $this->reset_data();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->modeAdd = false;
        }
    }

    public function delete($id)
    {
        try {
            $data = Portal_request_detail::find($id);
            $data->delete();

            $portal = Portal_request::find($data->portal_request_id);
            $portal_detail = Portal_request_detail::where('portal_request_id', $data->portal_request_id)->get();

            Portal_request_detail_log::create([
                "portal_request_id" => $data->portal_request_id,
                "portal_request_kategori_id" => $data->portal_request_kategori_id,
                "nama_barang" => $data->nama_barang,
                "harga_satuan" => $data->harga_satuan,
                "qty" => $data->qty,
                "discount" => $data->discount,
                "nilai_discount" => $data->nilai_discount,
                "harga_net" => $data->harga_net,
                "total_harga" => $data->total_harga,
                "keterangan" => $data->keterangan,
                "users_id" => auth()->user()->id,
                'status_proses' => "Hapus data"
            ]);


            $portal->update([
                "grand_total" => $portal_detail->sum('total_harga'),
                "sub_total" => $portal_detail->sum('total_harga')
            ]);

            session()->flash('success', 'Data Berhasil di hapus..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function update()
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
            $detail = Portal_request_detail::find($this->data_id);
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
            $this->modeEdit = false;
            $this->reset_data();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->modeEdit = false;
        }
    }

    public function updateDiskon()
    {
        // dd($this->diskon);
        try {
            $data = Portal_request::find($this->param);
            $sub_total = $data->sub_total;
            //total harga subtotal di kurangi diskon
            $total =  $data->sub_total - $this->diskon;
            //ppn harga total setelah diskon di kali 11 %
            //  $ppn = $total * (11 / 100);

            //grand total adalah total harga + ppn

            $data->update([
                "diskon" => $this->diskon,
                // "ppn" => $ppn,
                "grand_total" => $total,
            ]);

            session()->flash('success', 'Data Berhasil di simpan..');
            $this->modeDiskon = false;
            $this->reset_data();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->modeDiskon = false;
        }
    }

    public function ganti_vendor($id)
    {
        return redirect()->to('/portal-request-finance-staff-editvendor/' . $id);
    }

    public function posting($id)
    {
        return redirect()->to('/portal-request-finance-staff-posting/' . $id);
    }



    public function render()
    {
        $data = Portal_request::find($this->param);
        // dd($data);
        $data = Portal_request::find($this->param);
        $this->nomor_pr = $data->nomor_pr;
        $this->tgl_request = tgl_indo($data->tgl_request);
        $this->nama_vendor = $data->portal_vendor->nama_vendor;
        $this->description = $data->description;
        $this->grand_total = $data->grand_total;
        $this->sub_total = rupiah($data->sub_total);
        $this->ppn = $data->ppn;
        $this->diskon = $data->diskon;
        $portal_request_kategori = Portal_request_kategori::where('aktif', 'Y')->get();
        $data_detail = Portal_request_detail::where('portal_request_id', $this->param)->get();
        return view('livewire.user.finance.portal-finance-staff-detail', [
            "no" => 1,
            "data" => $data,
            "data_detail" => $data_detail,
            "portal_request_kategori" => $portal_request_kategori,
        ])->layout('layouts.main');
    }
}