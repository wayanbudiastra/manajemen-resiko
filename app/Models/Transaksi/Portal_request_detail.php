<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_request_detail extends Model
{
    use HasFactory;
    protected $table = 'portal_request_detail';
    protected $guarded = [];

    public function portal_request()
    {
        return $this->belongsTo(Portal_request::class);
    }

    public function portal_request_kategori()
    {
        return $this->belongsTo(Portal_request_kategori::class);
    }
}