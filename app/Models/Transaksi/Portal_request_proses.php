<?php

namespace App\Models\Transaksi;

use App\Models\Admin\Portal_level;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_request_proses extends Model
{
    use HasFactory;
    protected $table = 'portal_request_proses';
    protected $guarded = [];

    public function portal_request()
    {
        return $this->belongsTo(Portal_request::class, 'portal_request_id');
    }

    public function portal_request_status()
    {
        return $this->belongsTo(Portal_request_status::class, 'portal_status_id');
    }

    public function portal_level()
    {
        return $this->belongsTo(Portal_level::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cari_portal()
    {
        return $this->hasMany(Portal_request::class);
    }
}