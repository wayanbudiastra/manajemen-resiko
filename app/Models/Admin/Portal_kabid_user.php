<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_kabid_user extends Model
{
    use HasFactory;
    protected $table = 'portal_kabid_users';
    protected $guarded = [];

    public function portal_kabid()
    {
        return $this->belongsTo(Portal_kabid::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}