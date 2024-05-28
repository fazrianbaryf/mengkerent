<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginCT extends Controller
{

    public function index()
    {
        return view('login.index', [
            
        ]);
    }

    
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
            
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
        
}