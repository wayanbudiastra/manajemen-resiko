<?php

namespace App\Models\Transaksi;

use App\Models\Admin\Portal_unit;
use App\Models\Admin\Portal_vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_request extends Model
{
    use HasFactory;
    protected $table = 'portal_request';
    protected $guarded = [];

    public function portal_vendor()
    {
        return $this->belongsTo(Portal_vendor::class);
    }

    public function portal_unit()
    {
        return $this->belongsTo(Portal_unit::class);
    }

    public function portal_request_proses()
    {
        return $this->hasMany(Portal_request_proses::class);
    }
}