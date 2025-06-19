<?php

namespace App\Http\Livewire\User\Purchasing;

use App\Models\Admin\Portal_kabid;
use App\Models\Admin\Portal_unit;
use Livewire\Component;
use Livewire\WithPagination;

class PortalRekapData extends Component
{
    public $modeAdd = false;
    public $src = '';
    public $nama_unit = '';
    public $portal_kabid_id = '';

    use WithPagination;

    public function updatingSrc()
    {
        $this->resetPage();
    }

    function detail($id)
    {
        return redirect()->to('portal-user-request-list-rekap-detail/' . $id);
    }

    public function render()
    {
        $data = Portal_unit::orderby('id', 'desc')->paginate(10);
        $kabid = Portal_kabid::where('aktif', 'Y')->get();

        if (strlen($this->src) > 1) {
            $data = Portal_unit::where("nama_unit", "like", "%{$this->src}%")->paginate(10);
            //dd($this->src);
        }

        return view('livewire.user.purchasing.portal-rekap-data', [
            "no" => 1,
            "data" => $data,
            "kabid" => $kabid
        ])->layout('layouts.main');
    }
}