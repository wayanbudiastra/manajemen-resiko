<?php

namespace App\Models\Insiden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_kategori extends Model
{
    use HasFactory;
    protected $table = 'insiden_kategori';
    protected $guarded = [];

    public function insiden_kategori_nonmedis()
    {
        return $this->hasMany(Insiden_kategori_nonmedis::class);
    }

    public function insiden_kategori_medis()
    {
        return $this->hasMany(Insiden_kategori_medis::class);
    }
}
