<?php

namespace App\Models\Admin;

use App\Models\Master_v1\Kelas_jenis;
use App\Models\Master_v1\Kelas_skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'pelatihan';
    protected $guarded = [];

    public function kelas_jenis()
    {
        return $this->BelongsTo(Kelas_jenis::class, 'pelatihan_jenis_id');
    }
    public function kelas_skill()
    {
        return $this->belongsTo(Kelas_skill::class, 'pelatihan_skill_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_pelatihan()
    {
        return $this->hasMany(Pelatihan_user::class);
    }
}