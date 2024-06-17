<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderHistory;
use Illuminate\Support\Facades\Auth;

class OrderHistoryCT extends Controller
{
    /**
     * Menampilkan semua riwayat pesanan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data order histories
        $orderHistories = OrderHistory::all();

        // Mengirim data ke view order-history.blade.php
        return view('order-history', [
            'orderHistories' => $orderHistories,
            'title' => 'Order History'
        ]);
    }
    
    public function showByUserId($userId)
    {
        // Pastikan user yang sedang login hanya dapat melihat riwayat pesanannya sendiri
        if (Auth::id() != $userId) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Ambil semua data order histories berdasarkan user ID tanpa filter status
        $orderHistories = OrderHistory::where('user_id', $userId)->get();

        // Mengirim response dalam bentuk JSON
        return response()->json([
            'orderHistories' => $orderHistories,
            'message' => 'Success',
        ], 200);
    }
}