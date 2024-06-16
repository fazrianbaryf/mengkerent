<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderHistory;

class OrderHistoryCT extends Controller
{
    public function index()
    {
        // Mengambil semua data order histories
        $orderHistories = OrderHistory::all();

        // Mengirim data ke view
        return view('order-history', [
            'orderHistories' => $orderHistories,
            'title' => 'Order History'
        ]);
    }
}