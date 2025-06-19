<?php

namespace App\Http\Livewire\Admin\Setting\PortalKabid;

use App\Models\Admin\Portal_kabid;
use App\Models\Admin\Portal_kabid_user;
use App\Models\User;
use Exception;
use Livewire\Component;

class PortalKabidUser extends Component
{
    public $param;
    public $nama_kabid = '';
    public $aktif = '';
    public $users_id, $portal_kabid_id;


    public function mount($param = null)
    {
        $this->param = $param;
    }


    public function kembali()
    {
        return redirect()->to('admin-portal-kabid');
    }

    public function store()
    {
        try {
            $this->validate([
                'users_id' => 'required',

            ]);
            $data = Portal_kabid_user::create([
                'users_id' => $this->users_id,
                'portal_kabid_id' => $this->portal_kabid_id
            ]);
            session()->flash('success', 'Data Berhasil di simpan..');
            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
            $this->kembali();
        }
    }

    public function delete($id)
    {
        try {
            $data = Portal_kabid_user::find($id);
            $data->delete();
            session()->flash('success', 'Data Berhasil di hapus..');
            // dd($data);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function render()
    {
        try {
            $data = Portal_kabid::find($this->param);
            $this->nama_kabid = $data->nama_kabid;
            $this->aktif = $data->aktif;
            $this->portal_kabid_id = $data->id;
            $data_detail = Portal_kabid_user::where('portal_kabid_id', $this->param)->get();
            $data_user = User::where('aktif', 'Y')->get();

            // $data_user = User::whereDoesntHave('portal_kabid', function ($query) {
            //     return $query->where('portal_kabid_id', $this->param);
            // })->get(); // data user yang belum di maping 

            // dd($data_user);
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }

        return view('livewire.admin.setting.portal-kabid.portal-kabid-user', [
            "data" => $data,
            "data_detail" => $data_detail,
            "data_user" => $data_user,
            "no" => 1
        ])->layout('layouts.main-admin');
    }
}