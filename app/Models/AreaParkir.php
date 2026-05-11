<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaParkir extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_area',
        'kapasitas',
        'status',
    ];

    public function kendaraans(): HasMany
    {
        return $this->hasMany(Kendaraan::class, 'area_parkir_id');
    }
}

