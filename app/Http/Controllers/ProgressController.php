<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use App\Models\Progress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index()
    {
        return view('gate.progressMember', [
            "title" => "Login"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bbterkini' => 'required|gt:20|lt:500'
        ], [
            'bbterkini.required' => 'Kolom Berat Badan harus diisi.',
            'bbterkini.gt' => 'Berat Badan harus lebih besar dari 20 kg.',
            'bbterkini.lt' => 'Berat Badan harus kurang dari 500 kg.',
        ]);

        $startDate = Carbon::parse(Auth::user()->created_at);
        $endDate = Carbon::now();
        $diffInDays = $startDate->diffInDays($endDate);
        $progress = floor($diffInDays /  7);

        $statusCondition = UserData::firstWhere('user_id', Auth::user()->id);
        $mustBe = $statusCondition->current_weight + ($statusCondition->weekly_target * $progress);
        $user = User::find(Auth::user()->id);
        $user->update([
            'level' => '1'
        ]);
        if($mustBe != $request->bbterkini){
            $status = 0;
        }else{
            $status = 1;
        }
        Progress::create([
            'user_id' => Auth::user()->id,
            'date' => Carbon::now(),
            'weight' => $request->bbterkini,
            'status' => $status
        ]);
        return redirect('/member')->with(['success' => 'Pesan Berhasil']);
    }
}
