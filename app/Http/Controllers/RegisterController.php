<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserData;

class RegisterController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'level' => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        
        $user = User::create($validatedData);

        $validatedUserData = $request->validate([
            'current_height' => 'required|max:3',
            'current_weight' => 'required|max:3',
            'target' => 'required|max:5',
            'liveliness' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required'
        ]);

        if($request['target_weight_decrease'] != null){
            $validatedUserData['target_weight'] = $request['target_weight_decrease'];
        }else if($request['target_weight_increase'] != null){
            $validatedUserData['target_weight'] = $request['target_weight_increase'];
        }

        if($request['wt_decrease'] > 0){
            $validatedUserData['weekly_target'] = $request['wt_decrease'];
        }else if($request['wt_increase'] > 0){
            $validatedUserData['weekly_target'] = $request['wt_increase'];
        }

        $validatedUserData['user_id'] = $user->id;
        UserData::create($validatedUserData);
        // $request->session()->flash('success', 'Registration successful! Please Login');
        return redirect('/')->with('success', 'Registration successful! Please Login');
    }
}
