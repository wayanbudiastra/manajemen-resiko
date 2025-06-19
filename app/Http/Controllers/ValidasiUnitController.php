<?php

namespace App\Http\Controllers;

use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\Transaksi\Portal_request;
use Illuminate\Http\Request;

class ValidasiUnitController extends Controller
{
    //
    public function index()
    {
        $data_portal = Portal_request::all();
        foreach ($data_portal as $item) {
            $portal_unit = Portal_user_unit_level_mapping::where('users_id', $item->users_id)->first();
            //dd($portal_unit);
            $portal_unit_id = $portal_unit->portal_unit_id;
            $update_portal = Portal_request::find($item->id);
            $update_portal->update(['portal_unit_id' => $portal_unit_id]);
        }
    }
}