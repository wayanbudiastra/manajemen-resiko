<?php

namespace Database\Seeders;

use App\Models\Transaksi\Portal_request_status;
use Illuminate\Database\Seeder;

class Portal_request_status_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Portal_request_status::create(['status_request' => 'request']);
        Portal_request_status::create(['status_request' => 'waiting']);
        Portal_request_status::create(['status_request' => 'pending']);
        Portal_request_status::create(['status_request' => 'reject']);
        Portal_request_status::create(['status_request' => 'approve']);
    }
}