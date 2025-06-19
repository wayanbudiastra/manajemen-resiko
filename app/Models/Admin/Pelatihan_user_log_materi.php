<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_user_log_materi extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_user_log_materi';
    protected $guarded = [];

    public function pelatihan_user()
    {
        return $this->belongsTo(Pelatihan_user::class);
    }

    public function pelatihan_materi()
    {
        return $this->belongsTo(Pelatihan_materi::class);
    }
}