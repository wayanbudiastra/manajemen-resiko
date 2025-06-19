<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Pelatihan_user extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_user';
    protected $guarded = [];

    public function pelatihan()
    {
        return $this->BelongsTo(Pelatihan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_pelatihan()
    {
        return $this->hasMany(User::class);
    }
}