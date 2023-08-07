<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserData;

class RegisterController extends Controller
{
    public function index()
    {
        return view('gate.register', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request)
    {

        //If for Validating Target and Current Weight
        if ($request['target'] == "naik") {
            $target_weight_requirement = "gt:current_weight|lt:500";
        } else if ($request['target'] == "turun") {
            $target_weight_requirement = "lt:current_weight|gt:20";
        } else {
            $request['current_weight'] = $request['current_weight'];
            $target_weight_requirement = "";
        }
        //END If for Validating Target and Current Weight

        $validatedData = $request->validate([
            'name' => 'required|min:2|max:50',
            'username' => 'required|min:3|without_spaces|max:25|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|max:255',
            'level' => 'required',
            'current_weight' => 'required|gt:20|lt:500',
            'target_weight' => $target_weight_requirement,
            'current_height' => 'required|gt:100|lt:230',
            'target' => 'required',
            'liveliness' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|olderThan|youngerThan'
        ], [
            'name.required' => 'Kolom Nama Lengkap harus diisi.',
            'name.min' => 'Kolom Nama Lengkap minimal harus 2 karakter.',
            'name.max' => 'Kolom Nama Lengkap maksimal 50 karakter.',
            'current_weight.required' => 'Kolom Berat Badan harus diisi.',
            'current_weight.gt' => 'Berat Badan harus lebih besar dari 20 kg.',
            'current_weight.lt' => 'Berat Badan harus kurang dari 500 kg.',
            'current_height.required' => 'Kolom Tinggi Badan harus diisi.',
            'current_height.gt' => 'Tinggi Badan harus lebih dari 100 cm.',
            'current_height.lt' => 'Tinggi Badan harus kurang dari 230 cm.',
            'username.required' => 'Kolom Username harus diisi.',
            'username.min' => 'Kolom Username minimal harus 3 karakter.',
            'username.without_spaces' => 'Kolom Username tidak boleh ada spasi.',
            'username.max' => 'Kolom Username maksimal 25 karakter.',
            'username.unique' => 'Username tersebut sudah digunakan',
            'email.unique' => 'Email tersebut sudah digunakan',
            'password.confirmed' => 'Kolom Konfirmasi Password tidak sesuai',
            'date_of_birth.required' => 'Kolom Tanggal Lahir harus diisi.',
            'date_of_birth.older_than' => 'Usia Pengguna minimal 15 tahun',
            'date_of_birth.younger_than' => 'Usia Pengguna maksimal 80 tahun',
            'target.required' => 'Isikan sasaranmu',
            'liveliness.required' => 'Isikan keaktifanmu',
            'target_weight.gt' => 'Berat Badan Sasaran harus lebih besar dari Berat Badan saat ini',
            'target_weight.lt' => 'Berat Badan Sasaran harus lebih kecil dari Berat Badan saat ini',
        ]);

        if ($validatedData) {

            //Convert Date to Age
            $age = Carbon::parse($validatedData['date_of_birth'])->age;
            //End Convert Date to Age

            //Liveliness Check
            if ($validatedData['liveliness'] == "tidakterlalu") {
                $liveliness = 1.2;
            } elseif ($validatedData['liveliness'] == "agak") {
                $liveliness = 1.375;
            } elseif ($validatedData['liveliness'] == "aktif") {
                $liveliness = 1.55;
            } elseif ($validatedData['liveliness'] == "sangat") {
                $liveliness = 1.725;
            }
            //End Liveliness Check

            //If Not Maintain Calory
            if ($request->weekly_target !== null) {
                if ($request->weekly_target == 0.25) {
                    $a_week = 200;
                } elseif ($request->weekly_target == 0.5) {
                    $a_week = 400;
                } elseif ($request->weekly_target == 0.75) {
                    $a_week = 600;
                } elseif ($request->weekly_target == 1) {
                    $a_week = 800;
                }
            }

            //If Maintain Calory
            else {
                $a_week = 0;
            }

            //Calory Surplus
            if ($validatedData['target'] == "naik") {
                $interval_between_weight = $validatedData['target_weight'] - $validatedData['current_weight'];
                $week_to_goal = round($interval_between_weight / $request['weekly_target']);
                $target_weight = $request->target_weight;
                $weekly_target = $request->weekly_target;

                //Male
                if ($validatedData['gender'] == "l") {
                    $calory_a_day = round((((88.4 + 13.4 * $validatedData['current_weight']) + (4.8 * $validatedData['current_height']) - (5.68 * $age)) * $liveliness) + $a_week);
                }

                //Female
                else {
                    $calory_a_day = round((((447.6 + 9.25 * $validatedData['current_weight']) + (3.10 * $validatedData['current_height']) - (4.33 * $age)) * $liveliness) + $a_week);
                }

            //Calory Deficit
            } else if ($validatedData['target'] == "turun") {
                $interval_between_weight = $validatedData['current_weight'] - $validatedData['target_weight'];
                $week_to_goal = round($interval_between_weight / $request['weekly_target']);
                $target_weight = $request->target_weight;
                $weekly_target = $request->weekly_target;

                //Male
                if ($validatedData['gender'] == "l") {
                    $calory_a_day = round((((88.4 + 13.4 * $validatedData['current_weight']) + (4.8 * $validatedData['current_height']) - (5.68 * $age)) * $liveliness) - $a_week);
                }

                //Female
                else {
                    $calory_a_day = round((((447.6 + 9.25 * $validatedData['current_weight']) + (3.10 * $validatedData['current_height']) - (4.33 * $age)) * $liveliness) - $a_week);
                }
            //Maintain
            } else {
                $week_to_goal = 0;
                $target_weight = $request->current_weight;
                $weekly_target = 0;

                //Male
                if ($validatedData['gender'] == "l") {
                    $calory_a_day = round(((88.4 + 13.4 * $validatedData['current_weight']) + (4.8 * $validatedData['current_height']) - (5.68 * $age)) * $liveliness);
                }

                //Female
                else {
                    $calory_a_day = round(((447.6 + 9.25 * $validatedData['current_weight']) + (3.10 * $validatedData['current_height']) - (4.33 * $age)) * $liveliness);
                }
            }

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => $request->level,
            ]);
            UserData::create([
                'user_id' => $user->id,
                'current_weight' => $request->current_weight,
                'current_height' => $request->current_height,
                'target' => $request->target,
                'liveliness' => $request->liveliness,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'target_weight' => $target_weight,
                'weekly_target' => $weekly_target,
                'calory_a_day' => $calory_a_day,
                'week_to_goal' => $week_to_goal,
            ]);
            return redirect('/login')->with(['success' => 'Pesan Berhasil']);
        } else {
            return redirect('/')->with('failed', 'Registrasi Gagal');
        }
    }
}
