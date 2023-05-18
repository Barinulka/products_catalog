<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create() 
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        session()->flash('success', 'Вы успешно зарегистрированы!');
        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginForm() 
    {
        return view('auth.login');
    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } 

        return redirect()->back()->with('error', 'Неправильный Email или пароль');

    }

    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('home');
    }
}
