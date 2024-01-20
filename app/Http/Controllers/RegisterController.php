<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title'=> "Register",
            'active' => 'register'
        ]);
    }

    public function store(Request $request) 
    {
       $validateData = $request->validate([
            'name' => 'required|max:255',
            'username'=> ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        // $validateData['password'] = Hash::make($validateData['password']);
        // dd untuk print
        users::create($validateData);

        // $request->session()->flash('success', 'Registration Succesfully! Please login');

        return redirect('login')->with('success', 'Registration Succesfully! Please login');
    
    }
}
