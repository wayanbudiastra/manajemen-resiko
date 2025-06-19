<?php

namespace App\Http\Livewire\User\Direktur;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_detail;
use App\Models\Transaksi\Portal_request_kategori;
use App\Models\Transaksi\Portal_request_proses;
use App\Models\Transaksi\Portal_request_status;
use Exception;
use Livewire\Component;

class PortalDirekturDetail extends Component
{
    public $modeAdd = false;
    public $modeEdit = false;
    public $src = '';
    public $data_id, $grand_total, $users_id;
    public $portal_status_id, $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('portal-request-direktur-list');
    }

    public function posting()
    {
        $this->modeAdd = true;
    }

    public function store()
    {
        try {
            $this->validate([
                'portal_status_id' => 'required',
                'keterangan' => 'required',
            ]);

            $data = Portal_request_proses::create([
                "portal_request_id" => $this->param,
                "portal_level_id" => 5,
                "portal_status_id" => $this->portal_status_id,
                "users_id" => auth()->user()->id,
                "keterangan" => $this->keterangan
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
        try {
            $data = Portal_request::find($this->param);
            $this->nomor_pr = $data->nomor_pr;
            $this->tgl_request = $data->tgl_request;
            $this->nama_vendor = $data->portal_vendor->nama_vendor;
            $this->description = $data->description;
            $this->grand_total = $data->grand_total;
            $this->users_id = $data->users_id;
            $this->portal_status_id = 5;
            $portal_request_kategori = Portal_request_kategori::where('aktif', 'Y')->get();
            $data_detail = Portal_request_detail::where('portal_request_id', $this->param)->get();
            $portal_request_status = Portal_request_status::where('aktif', 'Y')->get();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.user.direktur.portal-direktur-detail', [
            "no" => 1,
            "data" => $data,
            "data_detail" => $data_detail,
            "portal_request_kategori" => $portal_request_kategori,
            "portal_request_status" => $portal_request_status
        ])->layout('layouts.main');
    }
}