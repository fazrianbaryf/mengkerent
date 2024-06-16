<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = [
       'customer_name', 'nama_mobil', 'plat_mobil', 'harga', 'no_telfon', 'pelayanan', 'alamat', 'status'
    ];
}