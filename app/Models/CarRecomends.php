<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRecomends extends Model
{
    use HasFactory;

    protected $table = 'cars_recomends'; // Nama tabel yang benar
    protected $fillable = [
        'car_recomend_id',
    ];

    public function carUnit()
    {
        return $this->belongsTo(CarUnits::class, 'car_recomend_id');
    }
}