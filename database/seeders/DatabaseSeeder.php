<?php

namespace Database\Seeders;

use App\Models\Transaksi\Portal_request_status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Portal_kabid_seeder::class,
            Portal_level_seeder::class,
            Portal_request_katagori_seeder::class,
           // Portal_request_status::class,
            Portal_unit_seeder::class
        ]);
    }
}