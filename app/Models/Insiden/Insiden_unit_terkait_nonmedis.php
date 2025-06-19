<?php

namespace App\Models\Insiden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_unit_terkait_nonmedis extends Model
{
    use HasFactory;
    protected $table = 'insiden_unit_terkait_nonmedis';
    protected $guarded = [];

    public function insiden_unit()
    {
        return $this->BelongsTo(Insiden_unit::class);
    }
    public function insiden_nonmedis()
    {
        return $this->BelongsTo(Insiden_nonmedis_request::class, 'insiden_nonmedis_request_id');
    }
}
