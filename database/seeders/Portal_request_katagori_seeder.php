<?php

namespace Database\Seeders;

use App\Models\Transaksi\Portal_request_kategori;
use Illuminate\Database\Seeder;

class Portal_request_katagori_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portal_request_kategori::create(['nama_request_kategori' => 'Peralatan']);
        Portal_request_kategori::create(['nama_request_kategori' => 'Jasa']);
        Portal_request_kategori::create(['nama_request_kategori' => 'Sperpart']);
        Portal_request_kategori::create(['nama_request_kategori' => 'Utilities']);
        Portal_request_kategori::create(['nama_request_kategori' => 'Kontrak Service']);
        Portal_request_kategori::create(['nama_request_kategori' => 'Human Capital']);
        Portal_request_kategori::create(['nama_request_kategori' => 'GA']);
        Portal_request_kategori::create(['nama_request_kategori' => 'Lainya']);
    }
}