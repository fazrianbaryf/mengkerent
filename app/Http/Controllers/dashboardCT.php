<?php

namespace App\Http\Controllers;

use App\Models\CarUnits;
use App\Models\OrderHistory;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardCT extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalRent = OrderHistory::where('status', 'selesai')->count();
        $totalUnit = CarUnits::count();
        
        // Menghitung total pendapatan dari pesanan yang selesai
        $totalRevenue = OrderHistory::where('status', 'selesai')->sum('harga');

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalUnit' => $totalUnit,
            'totalRent' => $totalRent,
            'totalRevenue' => $totalRevenue,
            'title' => 'Dashboard',
        ]);
    }
}