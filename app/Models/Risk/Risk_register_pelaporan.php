<?php

namespace App\Models\Risk;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk_register_pelaporan extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'risk_register_pelaporan';
    protected $guarded = [];

     public function user()
    {
        return $this->BelongsTo(User::class, 'users_id');
    }

     public function risk_evaluasi()
    {
        return $this->belongsTo(Risk_evaluasi::class);
    }

    public function risk_kategori()
    {
        return $this->belongsTo(Risk_kategori::class);
    }
}
