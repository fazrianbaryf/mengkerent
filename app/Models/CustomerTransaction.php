<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'car_unit_id',
        'nama_mobil',
        'plat_mobil',
        'harga',
        'no_telfon',
        'pelayanan',
        'alamat',
        'status',
    ];

    public function carUnit()
    {
        return $this->belongsTo(CarUnits::class, 'car_unit_id');
    }
}