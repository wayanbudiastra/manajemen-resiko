<?php

namespace Database\Seeders;

use App\Models\Admin\Portal_level;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class Portal_level_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portal_level::create(['nama_level' => 'Requester']);
        Portal_level::create(['nama_level' => 'Purchasing']);
        Portal_level::create(['nama_level' => 'Approval_level_1']);
        Portal_level::create(['nama_level' => 'Approval_level_2']);
        Portal_level::create(['nama_level' => 'Approval_level_3']);
        Portal_level::create(['nama_level' => 'Approval_level_4']);
    }
}