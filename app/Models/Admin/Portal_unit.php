<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_unit extends Model
{
    use HasFactory;
    protected $table = 'portal_unit';
    protected $guarded = [];

    public function portal_kabid()
    {
        return $this->belongsTo(Portal_kabid::class);
    }
}