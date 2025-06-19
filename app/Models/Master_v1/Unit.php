<?php

namespace App\Models\Master_v1;

use App\Models\Admin\Pelatihan_unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $guarded = [];


    public function pelatihan_unit()
    {
        return $this->hasMany(Pelatihan_unit::class);
    }
}