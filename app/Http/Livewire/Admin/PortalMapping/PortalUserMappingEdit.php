<?php

namespace App\Http\Livewire\Admin\PortalMapping;

use App\Models\Admin\Portal_level;
use App\Models\Admin\Portal_unit;
use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\User;
use Exception;
use Livewire\Component;

class PortalUserMappingEdit extends Component
{

    public $nama_user = '', $param;
    public $nik = '';
    public $email = '';
    public $unit = '';
    public $portal_admin = '';
    public $user_id = '';
    public $portal_level_id, $portal_unit_id, $portal_user_unit_level_mapping_id;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function store()
    {
        try {
            $this->validate([
                "portal_level_id" => "required",
                "portal_unit_id" => "required"
            ]);

            $data =  Portal_user_unit_level_mapping::find($this->portal_user_unit_level_mapping_id);
            $data->update([
                'portal_unit_id' => $this->portal_unit_id,
                'portal_level_id' => $this->portal_level_id
            ]);

            session()->flash('success', 'Data Berhasil di update..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }
    public function kembali()
    {
        return redirect()->to('admin-insiden-unit-mapping');
    }

    public function render()
    {
        $data = User::find($this->param);
        $this->nik = $data->nik;
        $this->nama_user = $data->first_name . ' ' . $data->last_name;
        $this->email = $data->email;
        $this->unit = $data->unit->nama_unit;

        $set1 = $data->id;
        $set2 = $data->id;
        $this->portal_unit_id = $set1['portal_unit_id'];
        $this->portal_level_id = $set2['portal_level_id'];
        // dd($set1['portal_unit_id']);
        $this->portal_user_unit_level_mapping_id = $set2['mapping_id'];
        $portal_unit = Portal_unit::where('aktif', 'Y')->get();
        $portal_level = Portal_level::where('aktif', 'Y')->get();
        return view('livewire.admin.portal-mapping.portal-user-mapping-edit', [
            'no' => 1,
            'data' => $data,
            'portal_level' => $portal_level,
            'portal_unit' => $portal_unit
        ])->layout('layouts.main-admin');
    }
}
