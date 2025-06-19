<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_user_log_soal extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_user_log_soal';
    protected $guarded = [];

    public function pelatihan_user_log()
    {
        return $this->belongsTo(Pelatihan_user_log::class);
    }

    public function pelatihan_soal()
    {
        return $this->belongsTo(Pelatihan_soal::class);
    }
}