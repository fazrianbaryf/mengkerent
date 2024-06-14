<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fazrian Baryfikri',
            'username' => 'Fazrian',
            'role' =>'admin',
            'email' => 'fazrian@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin'),
            'gender' => 'laki-laki',
            'no_telfon' => '081212836177',
            'pekerjaan' => 'Pengacara',
            'alamat' => 'JL.Pengepul berlian no 15000'
        ]);
    }
}