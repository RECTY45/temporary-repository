<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
    ];

    public function bengkels()
    {
        return $this->belongsToMany(Bengkel::class, 'bengkel_services');
    }
}
