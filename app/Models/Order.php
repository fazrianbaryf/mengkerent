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
        'durasi',
        'harga',
        'no_telfon',
        'pelayanan',
        'alamat',
        'status'
    ];

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 'tersedia':
                return 'Unit Tersedia';
                break;
            case 'proses':
                return 'Menunggu Konfirmasi';
                break;
            case 'diterima':
                return 'Unit Disewa';
                break;
            default:
                return $value; // Jika tidak ada yang cocok, kembalikan nilai aslinya
                break;
        }
    }

}