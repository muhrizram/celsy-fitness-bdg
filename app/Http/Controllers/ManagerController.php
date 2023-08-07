<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    
    public function dashboard(){
        $foods = Food::count();
        $exercises = Exercise::count();
        $users = User::count();

        return view('manager', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'foods' => $foods,
            'exercises' => $exercises,
            'users' => $users
        ]);
    }
}
