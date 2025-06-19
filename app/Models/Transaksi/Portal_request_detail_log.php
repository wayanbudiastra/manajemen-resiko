<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_request_detail_log extends Model
{
    use HasFactory;
    protected $table = 'portal_request_detail_log';
    protected $guarded = [];

    public function portal_request()
    {
        return $this->belongsTo(Portal_request::class);
    }
}