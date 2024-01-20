<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title'=> 'Login',
            'active'=> 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        
       $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // jika(kita jalankan class auth lalu attemp dari credential ini)
        if(Auth::attempt($credentials)) {
            // request session di generate
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // jika tidak terjadi classAuth dari credential langsung return error
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
