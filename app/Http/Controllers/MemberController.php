<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\Progress;
use App\Models\ExerciseProgram;
use App\Models\Exercise;
use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $userdata = UserData::firstWhere('user_id', Auth::user()->id);

        //Progress
        $startDate = Carbon::parse(Auth::user()->created_at);
        $endDate = Carbon::now();
        $diffInDays = $startDate->diffInDays($endDate);
        $progress = floor($diffInDays /  7);
        if($progress > $userdata->week_to_goal){
            $progress = $userdata->week_to_goal;
        }
        $userProgress = Progress::where('user_id', Auth::user()->id)->get();
        $countDataProgress = Progress::where('status',0)->count();
        //END Progress

        //Food Recommendation
        $userCalory = round($userdata->calory_a_day / 4);

        $sarapan = Food::where('classification', '=', 'sarapan')->where('calory', '<', $userCalory)->orderBy('carbohydrate', 'DESC')->get();
        $lunch = Food::where('classification', '=', 'makan siang')->where('calory', '<', $userCalory)->orderBy('protein', 'DESC')->get();
        $dinner = Food::where('classification', '=', 'makan malam')->where('calory', '<', $userCalory)->orderBy('fat', 'DESC')->get();
        $snack = Food::where('classification', '=', 'snack')->where('calory', '<', $userCalory)->orderBy('calory', 'DESC')->get();
        //END Food Recommendation

        //Exercise Recommendation
        $exercise = Exercise::get();
        $push1 = ExerciseProgram::all()->where('name', 'Push 1');
        $push2 = ExerciseProgram::all()->where('name', 'Push 2');
        $pull1 = ExerciseProgram::all()->where('name', 'Pull 1');
        $pull2 = ExerciseProgram::all()->where('name', 'Pull 2');
        $leg1 = ExerciseProgram::all()->where('name', 'Leg 1');
        $leg2 = ExerciseProgram::all()->where('name', 'Leg 2');
        $kardio = ExerciseProgram::all()->where('name', 'Kardio');
        $upper1 = ExerciseProgram::all()->where('name', 'Upper 1');
        $upper2 = ExerciseProgram::all()->where('name', 'Upper 2');
        $lower1 = ExerciseProgram::all()->where('name', 'Lower 1');
        $lower2 = ExerciseProgram::all()->where('name', 'Lower 2');
        $fbw1 = ExerciseProgram::all()->where('name', 'Full Body Workout 1');
        $fbw2 = ExerciseProgram::all()->where('name', 'Full Body Workout 2');
        $hwpush1 = ExerciseProgram::all()->where('name', 'Home Workout Push 1');
        $hwpush2 = ExerciseProgram::all()->where('name', 'Home Workout Push 2');
        $hwpull1 = ExerciseProgram::all()->where('name', 'Home Workout Pull 1');
        $hwpull2 = ExerciseProgram::all()->where('name', 'Home Workout Pull 2');
        $hwleg1 = ExerciseProgram::all()->where('name', 'Home Workout Leg 1');
        $hwleg2 = ExerciseProgram::all()->where('name', 'Home Workout Leg 2');
        $hwupper = ExerciseProgram::all()->where('name', 'Home Workout Upper');
        $hwfb1 = ExerciseProgram::all()->where('name', 'Home Workout Full Body 1');
        $hwfb2 = ExerciseProgram::all()->where('name', 'Home Workout Full Body 2');

        if ($userdata->place == 'gym') {
            if ($userdata->exercise_times == 0) {
                $senin = 0;
                $selasa = 0;
                $rabu = 0;
                $kamis = 0;
                $jumat = 0;
                $sabtu = 0;
            } else {
                if ($userdata->exercise_times == 6) {
                    $senin = $push1;
                    $selasa = $pull1;
                    $rabu = $leg1;
                    if ($userdata->target == 'turun') {
                        $kamis = $kardio;
                        $jumat = $upper1;
                        $sabtu = $lower1;
                    } else {
                        $kamis = $push2;
                        $jumat = $pull2;
                        $sabtu = $leg2;
                    }
                } elseif ($userdata->exercise_times == 5) {
                    if ($userdata->target == 'turun') {
                        $senin = $upper1;
                        $selasa = $lower1;
                        $rabu = $kardio;
                        $kamis = $upper2;
                        $jumat = $lower2;
                    } else {
                        $senin = $push1;;
                        $selasa = $pull1;
                        $rabu = $leg1;
                        $kamis = $upper1;
                        $jumat = $lower1;
                    }
                    $sabtu = ['*Rest Day*'];
                } elseif ($userdata->exercise_times == 4) {
                    if ($userdata->target == 'turun') {
                        $senin = $fbw1;
                        $selasa = $kardio;
                        $rabu = $upper1;
                        $kamis = $lower1;
                    } else {
                        $senin = $upper1;
                        $selasa =  $lower1;
                        $rabu = $upper2;
                        $kamis = $lower2;
                    }
                    $jumat = ['*Rest Day*'];
                    $sabtu = ['*Rest Day*'];
                } elseif ($userdata->exercise_times == 3) {
                    if ($userdata->target == 'turun') {
                        $senin = $fbw1;
                        $rabu = $kardio;
                        $kamis = $fbw2;
                    } else {
                        $senin = $fbw1;
                        $rabu =  $upper1;
                        $kamis = $lower2;
                    }
                    $selasa = ['*Rest Day*'];
                    $jumat = ['*Rest Day*'];
                    $sabtu = ['*Rest Day*'];
                } elseif ($userdata->exercise_times == 2) {
                    $senin = $fbw1;
                    $selasa = ['*Rest Day*'];
                    $rabu = $fbw2;
                    $kamis = ['*Rest Day*'];
                    $jumat = ['*Rest Day*'];
                    $sabtu = ['*Rest Day*'];
                }
            }
        } else {
            if ($userdata->exercise_times == 6) {
                $senin = $hwpush1;
                $selasa = $hwpull1;
                $rabu = $hwleg1;
                if ($userdata->target == 'turun') {
                    $kamis = $kardio;
                    $jumat = $hwupper;
                    $sabtu = $hwleg2;
                } else {
                    $kamis = $hwpush2;
                    $jumat = $hwpull2;
                    $sabtu = $hwleg2;
                }
            } elseif ($userdata->exercise_times == 5) {
                if ($userdata->target == 'turun') {
                    $senin = $hwupper;
                    $selasa = $hwleg1;
                    $rabu = $kardio;
                    $kamis = $hwupper;
                    $jumat = $hwleg2;
                } else {
                    $senin = $hwpush1;
                    $selasa = $hwpull1;
                    $rabu = $hwleg1;
                    $kamis = $hwupper;
                    $jumat = $hwleg2;
                }
                $sabtu = ['*Rest Day*'];
            } elseif ($userdata->exercise_times == 4) {
                if ($userdata->target == 'turun') {
                    $senin = $hwfb1;
                    $selasa = $kardio;
                    $rabu = $hwupper;
                    $kamis = $hwleg1;
                } else {
                    $senin = $hwupper;
                    $selasa =  $hwleg1;
                    $rabu = $hwupper;
                    $kamis = $hwleg2;
                }
                $jumat = ['*Rest Day*'];
                $sabtu = ['*Rest Day*'];
            } elseif ($userdata->exercise_times == 3) {
                if ($userdata->target == 'turun') {
                    $senin = $hwfb1;
                    $rabu = $kardio;
                    $kamis = $hwfb2;
                } else {
                    $senin = $hwfb1;
                    $rabu =  $hwupper;
                    $kamis = $hwleg1;
                }
                $selasa = ['*Rest Day*'];
                $jumat = ['*Rest Day*'];
                $sabtu = ['*Rest Day*'];
            } elseif ($userdata->exercise_times == 2) {
                $senin = $hwfb1;
                $selasa = ['*Rest Day*'];
                $rabu = $hwfb2;
                $kamis = ['*Rest Day*'];
                $jumat = ['*Rest Day*'];
                $sabtu = ['*Rest Day*'];
            }
        }
        //END Exercise Recommendation

        return view('member', [
            "title" => "Member",
            "userdata" => $userdata,
            "breakfast" => $sarapan,
            "lunch" => $lunch,
            "dinner" => $dinner,
            "snack" => $snack,
            "userCaloryBreakfast" => $userCalory,
            "userCaloryLunch" => $userCalory,
            "userCaloryDinner" => $userCalory,
            "userCalorySnack" => $userCalory,
            "progress" => $progress,
            "userProgress" => $userProgress,
            "exercise" => $exercise,
            'senin' => $senin,
            'selasa' => $selasa,
            'rabu' => $rabu,
            'kamis' => $kamis,
            'jumat' => $jumat,
            'sabtu' => $sabtu,
            'countDataProgress' => $countDataProgress
        ]);
    }

    public function edit_exercise(Request $request, $id)
    {
        $userdata = UserData::find($id);
        $userdata->exercise_times = $request['action'];
        if ($request['place']) {
            $userdata->place = $request['place'];
        }
        $userdata->save();
        return redirect('/member#latihan');
    }
}
