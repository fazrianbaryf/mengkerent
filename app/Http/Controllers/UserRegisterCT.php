<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRegisterCT extends Controller
{
    public function register(Request $request)
    {
        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            'gender' => 'required|string',
            'no_telfon' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 422);
        }

        // Buat dan simpan user baru
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'no_telfon' => $request->no_telfon,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'email_verified_at' => now(),
        ]);

        // Beri respons ke client bahwa registrasi berhasil
        return response()->json([
            'message' => 'Registrasi berhasil',
            'user' => $user
        ], 201);
    }
}