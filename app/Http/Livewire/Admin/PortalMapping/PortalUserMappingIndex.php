<?php

namespace App\Http\Livewire\Admin\PortalMapping;

use App\Models\Admin\Portal_level;
use App\Models\Admin\Portal_unit;
use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\User;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class PortalUserMappingIndex extends Component
{
    use WithPagination;

    public $modeAdd = false;
    public $src = '';
    public $nama_user = '';
    public $nik = '';
    public $email = '';
    public $unit = '';
    public $portal_admin = '';
    public $user_id = '';
    public $portal_level_id, $portal_unit_id;

    public function updatingSrc()
    {
        $this->resetPage();
    }
    function reset_data()
    {
        $this->nama_user = '';
        $this->email = '';
        $this->nik = '';
        $this->unit = '';
        $this->portal_admin = '';
        $this->user_id = '';
        $this->portal_level_id = '';
        $this->portal_unit_id = '';
    }
    public function add($id)
    {
        $this->reset();
        $data = User::find($id);
        $this->user_id = $data->id;
        $this->nama_user = $data->first_name . ' ' . $data->last_name;
        $this->nik = $data->nik;
        $this->email = $data->email;
        $this->unit = $data->unit->nama_unit;
        $this->portal_admin = $data->portal_admin;
        $this->modeAdd = true;
    }
    public function store()
    {
        try {
            $this->validate([
                "portal_level_id" => "required",
                "portal_unit_id" => "required"
            ]);

            Portal_user_unit_level_mapping::create([
                'users_id' => $this->user_id,
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
        $this->modeAdd = false;
        $this->reset_data();
    }

    public function edit($id)
    {
        return redirect()->to('admin-portal-mapping-edit/' . $id);
    }
    public function render()
    {
        $data = User::where('aktif', 'Y')->orderby('id', 'desc')->paginate(10);

        // $data = Portal_user_unit_level_mapping::paginate(10);
        // $data = User::whereDoesntHave('portal_user_unit_level_mapping', function ($query) {
        //     return $query->where('users_id');
        // })->get();

        $portal_unit = Portal_unit::where('aktif', 'Y')->get();
        $portal_level = Portal_level::where('aktif', 'Y')->get();

        // if (strlen($this->src > 2)) {
        //     $data = User::where('username', 'like', "%{$this->src}%")->orWhere('email', 'like', "%{$this->src}%")->orWhere('first_name', 'like', "%{$this->src}%")->orWhere('last_name', 'like', "%{$this->src}%")->paginate(10);
        // }

        if (strlen($this->src) > 2) {
            $data = User::where('aktif', 'Y')->where('username', 'like', "%{$this->src}%")->orWhere('email', 'like', "%{$this->src}%")->orWhere('first_name', 'like', "%{$this->src}%")->orWhere('last_name', 'like', "%{$this->src}%")->paginate(10);
        }

        return view('livewire.admin.portal-mapping.portal-user-mapping-index', [
            'no' => 1,
            'data' => $data,
            'portal_level' => $portal_level,
            'portal_unit' => $portal_unit
        ])->layout('layouts.main-admin');
    }
}