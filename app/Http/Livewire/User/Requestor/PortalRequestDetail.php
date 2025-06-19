<?php

namespace App\Http\Livewire\User\Requestor;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_detail;
use App\Models\Transaksi\Portal_request_detail_log;
use App\Models\Transaksi\Portal_request_kategori;
use App\Models\Transaksi\Portal_request_proses;
use Exception;
use Livewire\Component;

class PortalRequestDetail extends Component
{
    public $modeAdd = false;
    public $src = '', $grand_total;
    public $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('portal-user-request-index');
    }

    public function edit($id)
    {
        return redirect()->to('portal-user-request-detail-edit/' . $id);
    }

    public function batal()
    {
        $this->modeAdd = false;
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
        $this->modeAdd = true;
        $this->reset_data();
    }

    public function store()
    {
        $this->validate([
            'nama_barang' => 'required',
            'portal_request_kategori_id' => 'required',
            'harga_satuan' => 'required',
            'discount' => 'required',
            'qty' => 'required',
        ]);
        try {


            // $nilai_discount = $this->discount;
            //dd($nilai_discount);
            $this->total_harga = ($this->harga_satuan - $this->discount) * $this->qty;
            $detail = Portal_request_detail::create([
                "portal_request_id" => $this->param,
                "portal_request_kategori_id" => $this->portal_request_kategori_id,
                "nama_barang" => $this->nama_barang,
                "harga_satuan" => $this->harga_satuan,
                "qty" => $this->qty,
                "discount" => $this->discount,
                "nilai_discount" => $this->discount,
                "harga_net" => $this->harga_satuan - $this->discount,
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

            //data log
            Portal_request_detail_log::create([
                "portal_request_id" => $this->param,
                "portal_request_kategori_id" => $this->portal_request_kategori_id,
                "nama_barang" => $this->nama_barang,
                "harga_satuan" => $this->harga_satuan,
                "qty" => $this->qty,
                "discount" => $this->discount,
                "nilai_discount" => $this->discount,
                "harga_net" => $this->harga_satuan - $this->discount,
                "total_harga" => $this->total_harga,
                "keterangan" => $this->keterangan,
                "users_id" => auth()->user()->id,
                'status_proses' => "created data"
            ]);
            // dd($detail_log);

            session()->flash('success', 'Data Berhasil di simpan..');
            $this->modeAdd = false;
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->modeAdd = false;
        }
    }

    public function delete($id)
    {
        try {
            $data = Portal_request_detail::find($id);
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

            $data->delete();
            $portal = Portal_request::find($data->portal_request_id);
            $portal_detail = Portal_request_detail::where('portal_request_id', $data->portal_request_id)->get();

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

    public function posting()
    {
        try {
            $data = Portal_request_proses::create([
                "portal_request_id" => $this->param,
                "portal_level_id" => 1,
                "portal_status_id" => 1,
                "users_id" => auth()->user()->id,
                "keterangan" => "Request Berhasil di posting"
            ]);

            session()->flash('success', 'Data Berhasil di posting..');
            return redirect()->to('portal-user-request-index');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function ganti_vendor($id)
    {
        return redirect()->to('portal-user-request-ganti-vendor/' . $id);
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
        return view('livewire.user.requestor.portal-request-detail', [
            "no" => 1,
            "data" => $data,
            "data_detail" => $data_detail,
            "portal_request_kategori" => $portal_request_kategori,
        ])->layout('layouts.main');
    }
}