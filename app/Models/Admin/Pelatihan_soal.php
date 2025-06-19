<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_soal extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_soal';
    protected $guarded = [];

    public function pelatihan()
    {
        return $this->BelongsTo(Pelatihan::class);
    }
}