<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifParkir extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'jenis_kendaraan',
        'harga_per_jam',
        'denda',
    ];
}

