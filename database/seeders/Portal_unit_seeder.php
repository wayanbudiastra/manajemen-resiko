<?php

namespace Database\Seeders;

use App\Models\Admin\Portal_unit;
use Illuminate\Database\Seeder;

class Portal_unit_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Portal_unit::create(['nama_unit' => 'Purchasing']);
        Portal_unit::create(['nama_unit' => 'FO']);
        Portal_unit::create(['nama_unit' => 'GIZI']);
        Portal_unit::create(['nama_unit' => 'Rekam Medis']);
        Portal_unit::create(['nama_unit' => 'Radiology']);
        Portal_unit::create(['nama_unit' => 'OT']);
        Portal_unit::create(['nama_unit' => 'ICU/NICU']);
        Portal_unit::create(['nama_unit' => 'IPT']);
        Portal_unit::create(['nama_unit' => 'OPT']);
        Portal_unit::create(['nama_unit' => 'IT']);
        Portal_unit::create(['nama_unit' => 'Pharmacy']);
        Portal_unit::create(['nama_unit' => 'FM-GA']);
        Portal_unit::create(['nama_unit' => 'HC']);
        Portal_unit::create(['nama_unit' => 'Finance']);
        Portal_unit::create(['nama_unit' => 'ED']);
        Portal_unit::create(['nama_unit' => 'MCU']);
    }
}