<?php

namespace Database\Seeders;

use App\Models\Admin\Portal_kabid;
use Illuminate\Database\Seeder;

class Portal_kabid_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Portal_kabid::create(['nama_kabid' => 'Kabid.Keuangan']);
        Portal_kabid::create(['nama_kabid' => 'Kabid.Keperawatan']);
        Portal_kabid::create(['nama_kabid' => 'Kabid.Medis']);
    }
}