<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'customer_name',
        'car_unit_id',
        'nama_mobil',
        'plat_mobil',
        'harga',
        'pelayanan',
        'alamat',
        'status',
    ];
}