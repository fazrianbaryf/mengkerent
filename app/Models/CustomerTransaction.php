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
        'nama_mobil',
        'plat_mobil',
        'durasi',  // Pastikan durasi disertakan di sini
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

    public function carUnit()
    {
        return $this->belongsTo(CarUnits::class, 'car_unit_id');
    }
}