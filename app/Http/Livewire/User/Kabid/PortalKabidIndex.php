<?php

namespace App\Http\Livewire\User\Kabid;

use App\Models\Admin\Portal_kabid_user;
use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_proses;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class PortalKabidIndex extends Component
{
    use WithPagination;
    public $modeAdd = false;
    public $src = '', $portal_kabid_id;
    public $nomor_pr = '', $tgl_request = '', $portal_vendor_id = '',  $description = '', $sub_total = '', $ppn = '';

    public function add()
    {
        $this->modeAdd = true;
    }

    public function updatingSrc()
    {
        $this->resetPage();
    }

    public function store()
    {
        try {
            $this->validate([
                'description' => 'required',

            ]);

            Portal_request::create([
                "nomor_pr" => $this->nomor_pr,
                "tgl_request" => date('Y-m-d'),
                "portal_vendor_id" => '1',
                "description" => $this->description,
                "users_id" => auth()->user()->id
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }


    public function history($id)
    {
        return redirect()->to('portal-kabid-list-history/' . $id);
    }


    public function lanjut($id)
    {
        return redirect()->to('portal-kabid-list-detail/' . $id);
    }


    public function kembali()
    {
        $this->modeAdd = false;
        $this->updatingSrc();
    }

    public function render()
    {
        //$data = Portal_request_proses::where('portal_level_id', '2')->where('portal_status_id', '5')->orderby('id', 'desc')->paginate(10);
        // data yang sudah di approve purchaasing tampil pada list kabid untuk proses approval 
        // dd($data);

        //cek data unit dari masing-kabid
        $data_unit = Portal_kabid_user::where('users_id', auth()->user()->id)->first();
        $this->portal_kabid_id = $data_unit->portal_kabid_id;

        $test = Portal_request_proses::where('portal_level_id', '2')->where('portal_status_id', '5')->with('portal_request')
            ->whereHas('portal_request', function (Builder $query) {
                $query->with('portal_unit')->whereHas('portal_unit', function (Builder $query1) {
                    $query1->where('portal_kabid_id', $this->portal_kabid_id);
                });
            })->orderby('id', 'desc')->paginate(10);

        //dd($test);

        $data = Portal_request::orderby('id', 'desc')->paginate(10);
        // dd($data);
        if (strlen($this->src) > 2) {
            $test = Portal_request_proses::where('portal_level_id', '2')->where('portal_status_id', '5')->with('portal_request')
                ->whereHas('portal_request', function (Builder $query) {
                    $query->where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->with('portal_unit')->whereHas('portal_unit', function (Builder $query1) {
                        $query1->where('portal_kabid_id', $this->portal_kabid_id);
                    });
                })->orderby('id', 'desc')->paginate(10);
            $data = Portal_request::where('nomor_pr', 'like', "%{$this->src}%")->orWhere('description', 'like', "%{$this->src}%")->paginate(15);
        }

        return view('livewire.user.kabid.portal-kabid-index', [
            "no" => 1,
            "data" => $data,
            "test" => $test
        ])->layout('layouts.main');
    }
}