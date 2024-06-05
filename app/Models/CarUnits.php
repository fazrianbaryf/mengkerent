<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarUnits extends Model
{
    use HasFactory;

    protected $table = 'car-units';
    protected $fillable = [
        'plat_mobil',
        'nama_mobil',
        'merk_mobil',
        'tahun_mobil',
        'transmisi',
        'car_category',
        'car_photo',
        'price_6jam',
        'price_12jam',
        'price_24jam',
        'syarat_ketentuan',
    ];
    
    public function getCarCategoryAttribute($value)
    {
        $specialCategories = ['mvp', 'suv'];

        if (in_array(strtolower($value), $specialCategories)) {
            return strtoupper($value);
        }

        if (strtolower($value) === 'sedan') {
            return ucfirst($value);
        }

        return ucfirst($value);
    }

    public function getTransmisiAttribute($value)
    {
        return strtoupper($value);
    }

    public function recommends()
    {
        return $this->hasMany(CarRecomends::class, 'car_recomend_id');
    }
}