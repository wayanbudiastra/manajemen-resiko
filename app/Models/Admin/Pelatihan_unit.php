<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_unit extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_unit';
    protected $guarded = [];

    public function pelatihan()
    {
        return $this->BelongsTo(Pelatihan::class);
    }
}