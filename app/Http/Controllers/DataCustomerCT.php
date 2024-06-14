<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class dataCustomerCT extends Controller
{
    public function index()
    {
        // Ambil data user dengan peran 'user' saja
        $users = User::where('role', 'user')->get();
        
        // Kemudian kirim data ke view bersama dengan variabel title
        return view('data-customer', ['title' => 'Data Customer', 'users' => $users]);
    }
}