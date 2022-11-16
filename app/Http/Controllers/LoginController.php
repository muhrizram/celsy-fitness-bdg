<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if($user=Auth::user()){
            if($user->log_in == '0'){
                return redirect()->intended('welcome');
            }elseif($user->log_in == '1'){
                return redirect()->intended('biodata');
            }elseif($user->log_in == '2'){
                return redirect()->intended('dashboard');
            }
        }
        return view('login.index');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->log_in == '0') {
                return redirect()->intended('welcome');
            }
            elseif($user->log_in == '1'){
                return redirect()->intended('biodata');
            }  
            elseif($user->log_in == '2'){
                return redirect()->intended('dashboard');
            }  
        }
        return back()->withErrors([
            'msg' => 'Username atau Password salah'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
