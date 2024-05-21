<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            if(Auth::user()->role == 'ADMIN') {
                return redirect()->intended('dashboard/admin/article');
            } else if(Auth::user()->role == 'USER') {
                return redirect()->intended('dashboard/user/article');
            }
        }

        return redirect('login')->with('error', 'The provided credentials do not match our records.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
