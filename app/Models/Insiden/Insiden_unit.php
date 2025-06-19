<?php

namespace App\Models\Insiden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_unit extends Model
{
    use HasFactory;
    protected $table = 'insiden_unit';
    protected $guarded = [];

    public function insiden_unit_terkait_nonmedis()
    {
        return $this->hasMany(Insiden_unit_terkait_nonmedis::class);
    }

    public function insiden_unit_terkait_medis()
    {
        return $this->hasMany(Insiden_unit_terkait_medis::class);
    }
}
