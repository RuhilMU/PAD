<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('owner/pegawai??')->except([ ///do not know
            'logout', 'dashboard'
        ]); 
    }

///no register fr?

    public function login(){
        return view(auth.login);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')
            ->withSuccess('Logged In.');
        }
        return back()->withErrors([
            'email' => 'Email/Password Tidak Sesuai.',
        ])->onlyInput('email');
    }

    public function dashboard(){
        if(Auth::check()){
            return view('auth.dashboard');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'Email/Password Salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenrateToken();
        return redirect()->route('login')
        ->withSuccess( 'Logged Out.');
    }
}
