<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\User;
use App\Models\Progress;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function index()
    {
        $user_data = UserData::latest()->search(request(['search']))->with('pengguna')->paginate(10)->withQueryString();

        return view('dashboard.user_data.index', [
            'title' => 'Pengguna Aplikasi',
            'active' => 'user_data',
            'userdata' => $user_data
        ]);
    }

    public function show(UserData $userdata, User $user)
    {
        $userdata = UserData::where('user_id', $user->id )->first();
        return view('dashboard.user_data.show', [
            'title' => 'Detail Pengguna Aplikasi',
            'active' => 'user_data',
            'user_data' => $userdata
        ]);
    }

    public function destroy(UserData $userdata, User $user)
    {
        $userdata = UserData::where('user_id', $user->id )->first();
        $progress = Progress::where('user_id', $user->id )->delete();

        $userdata->delete();
        $user->delete();
        return redirect('/manager/pengguna-aplikasi')->with(['danger' => $user->name]);
    }
}
