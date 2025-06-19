<?php

namespace App\Http\Livewire\Admin\Insiden\UserUnitInsiden;

use App\Models\Insiden\Insiden_level;
use App\Models\Insiden\Insiden_unit;
use App\Models\Insiden\Insiden_unit_user;
use App\Models\User;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class UserUnitInsidenEdit extends Component
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
    public $insiden_level_id, $insiden_unit_id, $insiden_unit_user_id, $param;

    public function mount($param = null)
    {
        $this->param = $param;
    }

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
        $this->insiden_level_id = '';
        $this->insiden_unit_id = '';
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
        $this->validate([
            "insiden_level_id" => "required",
            "insiden_unit_id" => "required"
        ]);
        try {
            $data =  Insiden_unit_user::find($this->insiden_unit_user_id);
            $data->update([

                'insiden_unit_id' => $this->insiden_unit_id,
                'insiden_level_id' => $this->insiden_level_id,
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
        $this->reset();
        return redirect()->to('admin-insiden-unit-mapping');
    }

    public function edit($id)
    {
        return redirect()->to('admin-insiden-unit-mapping-edit/' . $id);
    }
    public function render()
    {
        $data = User::find($this->param);
        $this->nik = $data->nik;
        $this->nama_user = $data->first_name . ' ' . $data->last_name;
        $this->email = $data->email;
        $this->unit = $data->unit->nama_unit;

        $set1 = insiden_unit_user($data->id);
        $set2 = insiden_level_user($data->id);
        $this->insiden_unit_id = $set1['insiden_unit_id'];
        $this->insiden_level_id = $set2['insiden_level_id'];
        // dd($set1['insiden_unit_id']);
        $this->insiden_unit_user_id = $set2['mapping_id'];

        $insiden_unit = Insiden_unit::where('aktif', 'Y')->get();
        $insiden_level = Insiden_level::where('aktif', 'Y')->get();

        // if (strlen($this->src > 2)) {
        //     $data = User::where('username', 'like', "%{$this->src}%")->orWhere('email', 'like', "%{$this->src}%")->orWhere('first_name', 'like', "%{$this->src}%")->orWhere('last_name', 'like', "%{$this->src}%")->paginate(10);
        // }

        if (strlen($this->src) > 2) {
            $data = User::where('aktif', 'Y')->where('username', 'like', "%{$this->src}%")->orWhere('email', 'like', "%{$this->src}%")->orWhere('first_name', 'like', "%{$this->src}%")->orWhere('last_name', 'like', "%{$this->src}%")->paginate(10);
        }

        return view('livewire.admin.insiden.user-unit-insiden.user-unit-insiden-edit', [
            'no' => 1,
            'data' => $data,
            'insiden_level' => $insiden_level,
            'insiden_unit' => $insiden_unit
        ])->layout('layouts.main-admin');
    }
}
