<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function index()
    {
        $user_data = UserData::latest()->paginate(5);

        return view('dashboard.user_data.index', [
            'title' => 'User Data',
            'active' => 'user_data',
            'user_data' => $user_data,
            'user_data_mobile' => $user_data
        ]);
    }

    public function show(UserData $pengguna_aplikasi)
    {
        return view('dashboard.user_data.show', [
            'title' => 'Detail Pengguna Aplikasi',
            'active' => 'user_data',
            'user_data' => $pengguna_aplikasi
        ]);
    }
}
