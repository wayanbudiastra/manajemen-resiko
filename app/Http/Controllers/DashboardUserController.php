<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    //
    public function index()
    {
       
            return redirect()->to('dashboard-requestor');
       
    }
}