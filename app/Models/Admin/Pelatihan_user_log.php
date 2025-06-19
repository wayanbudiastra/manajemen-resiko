<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_user_log extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_user_log';
    protected $guarded = [];

    public function pelatihan_user()
    {
        return $this->belongsTo(Pelatihan_user::class, 'pelatihan_user_id');
    }
}