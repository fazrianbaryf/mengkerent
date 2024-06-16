<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id', 'customer_name', 'nama_mobil', 'plat_mobil', 'durasi', 'harga', 'no_telfon', 'pelayanan', 'alamat', 'status'
    ];

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 'selesai':
                return 'Selesai Disewa';
                break;
            case 'ditolak':
                return 'Ditolak Administrator';
                break;
            case 'dicancel':
                return 'Dicancel Customer';
                break;
            default:
                return $value; // Jika tidak ada yang cocok, kembalikan nilai aslinya
                break;
        }
    }

}