<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_user_unit_level_mapping extends Model
{
    use HasFactory;
    protected $table = 'portal_user_unit_level_mapping';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function portal_unit()
    {
        return $this->belongsTo(Portal_unit::class);
    }

    public function portal_level()
    {
        return $this->belongsTo(Portal_level::class);
    }
}