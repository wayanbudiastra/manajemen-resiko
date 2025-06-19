<?php

namespace App\Models;

use App\Models\Admin\Pelatihan_user;
use App\Models\Admin\Portal_kabid;
use App\Models\Master_v1\Unit;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'full_name',
        'email',
        'password',
        'unit_id',
        'nik',
        'aktif',
        'foto_profile',
        'level',
        'approval',
        'portal_admin',
        'admin_insiden'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function pelatihan_user()
    {
        return $this->hasMany(Pelatihan_user::class);
    }

    public function portal_kabid()
    {
        return $this->hasMany(Portal_kabid::class);
    }
}
