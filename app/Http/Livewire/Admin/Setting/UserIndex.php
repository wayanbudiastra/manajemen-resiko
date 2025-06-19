<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{

    public $modeAdd = false;
    public $src = '';
    public $nama_user = '';
    public $nik = '';
    public $email = '';
    public $unit = '';
    public $admin_insiden = '';
    public $user_id = '';


    use WithPagination;

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
        $this->admin_insiden = '';
        $this->user_id = '';
    }
    public function edit($id)
    {
        $data = User::find($id);
        //dd($data);
        $this->user_id = $data->id;
        $this->nama_user = $data->first_name . ' ' . $data->last_name;
        $this->nik = $data->nik;
        $this->email = $data->email;
        $this->unit = $data->unit->nama_unit;
        $this->admin_insiden = $data->admin_insiden;
        $this->modeAdd = true;
    }

    public function kembali()
    {
        $this->modeAdd = false;
        $this->reset_data();
    }

    public function store()
    {
        // dd($this->admin_insiden);
        try {
            $data = User::find($this->user_id);
            $data->update([
                'admin_insiden' => $this->admin_insiden
            ]);
            // dd($data);
            session()->flash('success', 'Data Berhasil di update..');
            // dd($data);

            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }

    public function reset_password($id)
    {
        try {
            $data = User::find($id);
            $data->update([
                'password' => Hash::make('12345678'),
            ]);
            //dd($this->admin_insiden);
            session()->flash('success', "Password " . get_nama_user($id) . " Berhasil di reset menjadi 12345678...");
            // dd($data);

            $this->kembali();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan..' . $e);
        }
    }
    public function render()
    {
        $data = User::orderby('id', 'desc')->paginate(10);

        // if (strlen($this->src > 2)) {
        //     $data = User::where('username', 'like', "%{$this->src}%")->orWhere('email', 'like', "%{$this->src}%")->orWhere('first_name', 'like', "%{$this->src}%")->orWhere('last_name', 'like', "%{$this->src}%")->paginate(10);
        // }

        if (strlen($this->src) > 2) {
            $data = User::where('username', 'like', "%{$this->src}%")->orWhere('email', 'like', "%{$this->src}%")->orWhere('first_name', 'like', "%{$this->src}%")->orWhere('last_name', 'like', "%{$this->src}%")->paginate(10);
        }


        return view('livewire.admin.setting.user-index', [
            'no' => 1,
            'data' => $data
        ])->layout('layouts.main-admin');
    }
}
