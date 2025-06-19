<?php

namespace App\Http\Livewire\User\Finance;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_proses;
use App\Models\Transaksi\Portal_request_status;
use Exception;
use Livewire\Component;

class PortalFinanceStaffAproval extends Component
{
    public $param, $nama_vendor = '', $portal_request_id = '', $portal_request_kategori_id = '', $nama_barang = '', $harga_satuan = '', $qty = '', $keterangan, $discount, $nilai_discount, $harga_net, $total_harga;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '', $portal_status_id = '', $diskon;
    public $grand_total, $users_id;
    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function kembali()
    {
        return redirect()->to('/portal-request-finance-staff-detail/' . $this->param);
    }

    public function store()
    {
        $this->validate([
            'portal_status_id' => 'required',
            'keterangan' => 'required',
        ]);
        try {
            $data = Portal_request::find($this->param);
            $sub_total = $data->sub_total;
            $this->diskon = $data->diskon;
            //total harga subtotal di kurangi diskon
            $total =  $data->sub_total - $this->diskon;
            //ppn harga total setelah diskon di kali 11 %
            $ppn11 = $total * (11 / 100);

            //grand total adalah total harga + ppn
            if ($this->ppn == "Y") {
                $data->update([
                    "diskon" => $this->diskon,
                    "ppn" => $ppn11,
                    "grand_total" => $total + $ppn11,
                ]);
            } else {
                $data->update([
                    "diskon" => $this->diskon,
                    "ppn" => 0,
                    "grand_total" => $total,
                ]);
            }

            $data1 = Portal_request_proses::create([
                "portal_request_id" => $this->param,
                "portal_level_id" => 2,
                "portal_status_id" => $this->portal_status_id,
                "users_id" => auth()->user()->id,
                "keterangan" => $this->keterangan
            ]);

            session()->flash('success', 'Data Berhasil di posting..');
            $this->kembali();
            // dd($data);
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
        $this->portal_vendor_id = $data->portal_vendor_id;
        $this->nama_vendor = $data->portal_vendor->nama_vendor;
        $this->description = $data->description;
        $this->grand_total = $data->grand_total;
        $this->users_id = $data->users_id;
        $this->ppn = 'Y';
        $this->portal_status_id = 5;

        $portal_request_status = Portal_request_status::where('aktif', 'Y')->get();
        
        return view('livewire.user.finance.portal-finance-staff-aproval', [
            "portal_request_status" => $portal_request_status
        ])->layout('layouts.main');
    }
}