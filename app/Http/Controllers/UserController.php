<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Menampilkan profil pengguna berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    /**
     * Mengedit profil pengguna berdasarkan ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Pastikan pengguna hanya dapat mengedit profil mereka sendiri (atau admin dapat mengedit profil pengguna lain)
        if ($user->id !== Auth::id() && Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Validasi request
        $validatedData = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'nullable|in:user,admin',
            'gender' => 'in:Laki-laki,Perempuan',
            'no_telfon' => 'string',
            'pekerjaan' => 'string',
            'alamat' => 'string',
        ]);

        // Set default role to 'user' if no role is provided
        if (!isset($validatedData['role'])) {
            $validatedData['role'] = 'user';
        }

        // Update data pengguna
        $user->fill($validatedData);

        // Jika ada perubahan password, enkripsi password baru
        if (isset($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return response()->json(['user' => $user], 200);
    }
}