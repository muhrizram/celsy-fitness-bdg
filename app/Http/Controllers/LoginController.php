<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('gate.login', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Auth::user();
            if (Auth::user()->level == 2) {
                return redirect()->intended('/manager/dashboard');
            } else {
                $startDate = Carbon::parse(Auth::user()->created_at);
                $endDate = Carbon::now();
                $diffInDays = $startDate->diffInDays($endDate);
                $progressCount = floor($diffInDays /  7);
                $progress = Progress::where('user_id', Auth::user()->id)->latest('date')->get();
                if ($progress->isNotEmpty()) {
                    $progressDate =  Carbon::parse($progress[0]->date);
                    $progressDateInterval =  $progressDate->diffInDays($endDate);
                    if ((($diffInDays % 7) == 0) && ($progressDateInterval > 0)) {
                        $userlogin = User::firstWhere('id', Auth::user()->id);
                        $userlogin->update([
                            'level' => 3,
                        ]);
                        return redirect('/member/progress')->with(['success' => 'Pesan Berhasil']);
                    }else {
                        return redirect('/member')->with(['success' => 'Pesan Berhasil']);
                    }
                } else if ($progress->isEmpty() && ($progressCount > 0) || ($diffInDays > 0)) {
                    $userlogin = User::firstWhere('id', Auth::user()->id);
                    $userlogin->update([
                        'level' => 3,
                    ]);
                    return redirect('/member/progress')->with(['success' => 'Pesan Berhasil']);
                } else {
                    return redirect('/member')->with(['success' => 'Pesan Berhasil']);
                }
            }
        }
        return back()->withInput()->withErrors([
            'msg' => 'Nama Pengguna atau Kata Sandi salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
