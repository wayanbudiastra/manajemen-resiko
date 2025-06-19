<?php

namespace App\Models\Insiden;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_medis_request extends Model
{
    use HasFactory;
    protected $table = 'insiden_medis_request';
    protected $guarded = [];

    public function user()
    {
        return $this->BelongsTo(User::class, 'users_id');
    }
    public function insiden_status()
    {
        return $this->belongsTo(Insiden_status::class);
    }
    public function insiden_grade()
    {
        return $this->belongsTo(Insiden_grade::class);
    }
    public function insiden_ruangan()
    {
        return $this->belongsTo(Insiden_ruangan::class);
    }

    public function insiden_jenis()
    {
        return $this->belongsTo(Insiden_jenis::class);
    }
    public function insiden_penanggung_biaya()
    {
        return $this->belongsTo(Insiden_penanggung_biaya::class);
    }
    public function insiden_dampak()
    {
        return $this->belongsTo(Insiden_dampak::class);
    }

    public function insiden_pic_user()
    {
        return $this->BelongsTo(User::class, 'users_id');
    }
}
