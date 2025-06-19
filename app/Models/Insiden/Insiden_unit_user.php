<?php

namespace App\Models\Insiden;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_unit_user extends Model
{
    use HasFactory;
    protected $table = 'insiden_unit_user';
    protected $guarded = [];

    public function insiden_unit()
    {
        return $this->BelongsTo(Insiden_unit::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function insiden_level()
    {
        return $this->belongsTo(Insiden_level::class);
    }
}
