<?php

namespace App\Models\Insiden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_kategori_medis extends Model
{
    use HasFactory;
    protected $table = 'insiden_kategori_medis';
    protected $guarded = [];

    public function insiden_kategori()
    {
        return $this->BelongsTo(Insiden_kategori::class);
    }
}
