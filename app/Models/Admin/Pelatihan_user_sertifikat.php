<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_user_sertifikat extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'pelatihan_user_sertifikat';
    protected $guarded = [];

    public function pelatihan_user()
    {
        return $this->belongsTo(Pelatihan_user::class);
    }
}