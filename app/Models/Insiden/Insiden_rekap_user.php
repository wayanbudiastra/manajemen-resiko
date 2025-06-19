<?php

namespace App\Models\Insiden;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden_rekap_user extends Model
{
    use HasFactory;
    protected $table = 'insiden_rekap_user';
    protected $guarded = [];


    public function user()
    {
        return $this->BelongsTo(User::class);
    }

}
