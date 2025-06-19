<?php

namespace App\Models\Insiden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_unit_terkait_medis extends Model
{
    use HasFactory;
    protected $table = 'insiden_unit_terkait_medis';
    protected $guarded = [];

    public function insiden_unit()
    {
        return $this->BelongsTo(Insiden_unit::class);
    }

    public function insiden_medis()
    {
        return $this->BelongsTo(Insiden_medis_request::class, 'insiden_medis_request_id');
    }
}
