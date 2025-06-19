<?php

namespace App\Models\Admin;

use App\Models\Master_v1\Materi_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_materi extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_materi';
    protected $guarded = [];

    public function pelatihan()
    {
        return $this->BelongsTo(Pelatihan::class);
    }

    public function materi_type()
    {
        return $this->belongsTo(Materi_type::class);
    }

    public function list_pelatihan()
    {
        return $this->hasMany(Pelatihan::class);
    }
}