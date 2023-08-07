<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExerciseProgram;
use App\Models\Exercise;

class ExerciseProgramController extends Controller
{
    public function gate()
    {
        return view('dashboard.exercise_programs.gate', [
            "title" => "Program Latihan",
            "active" => "programLatihan"
        ]);
    }

    public function index($id)
    {
        // Link
        if($id == 'push-1'){
            $decision = "Push 1";
        }elseif($id == 'push-2'){
            $decision = "Push 2";
        }elseif($id == 'pull-1'){
            $decision = "Pull 1";
        }elseif($id == 'pull-2'){
            $decision = "Pull 2";
        }elseif($id == 'leg-1'){
            $decision = "Leg 1";
        }elseif($id == 'leg-2'){
            $decision = "Leg 2";
        }elseif($id == 'upper-1'){
            $decision = "Upper 1";
        }elseif($id == 'upper-2'){
            $decision = "Upper 2";
        }elseif($id == 'lower-1'){
            $decision = "Lower 1";
        }elseif($id == 'lower-2'){
            $decision = "Lower 2";
        }elseif($id == 'full-body-1'){
            $decision = "Full Body Workout 1";
        }elseif($id == 'full-body-2'){
            $decision = "Full Body Workout 2";
        }elseif($id == 'home-push-1'){
            $decision = "Home Workout Push 1";
        }elseif($id == 'home-push-2'){
            $decision = "Home Workout Push 2";
        }elseif($id == 'home-pull-1'){
            $decision = "Home Workout Pull 1";
        }elseif($id == 'home-pull-2'){
            $decision = "Home Workout Pull 2";
        }elseif($id == 'home-leg-1'){
            $decision = "Home Workout Leg 1";
        }elseif($id == 'home-leg-2'){
            $decision = "Home Workout Leg 2";
        }elseif($id == 'home-upper'){
            $decision = "Home Workout Upper";
        }elseif($id == 'home-full-body-1'){
            $decision = "Home Workout Full Body 1";
        }elseif($id == 'home-full-body-2'){
            $decision = "Home Workout Full Body 2";
        }elseif($id == 'kardio'){
            $decision = "Kardio";
        }
        // END Link

        // Getting Exercise Program Data
        $exerciseProgram = ExerciseProgram::all()->where('name', $decision);
        // END Getting Exercise Program Data

        // VIEW to blade
        return view('dashboard.exercise_programs.index', [
            "title" => "Program Latihan",
            "active" => "programLatihan",
            "title" => "Program ".$decision,
            "program_id" => $id,
            "exerciseProgram" => $exerciseProgram
        ]);
        // END VIEW to blade
    }

    public function create($id)
    {
        if($id == 'push-1'){
            $decision = "Push 1";
        }elseif($id == 'push-2'){
            $decision = "Push 2";
        }elseif($id == 'pull-1'){
            $decision = "Pull 1";
        }elseif($id == 'pull-2'){
            $decision = "Pull 2";
        }elseif($id == 'leg-1'){
            $decision = "Leg 1";
        }elseif($id == 'leg-2'){
            $decision = "Leg 2";
        }elseif($id == 'upper-1'){
            $decision = "Upper 1";
        }elseif($id == 'upper-2'){
            $decision = "Upper 2";
        }elseif($id == 'lower-1'){
            $decision = "Lower 1";
        }elseif($id == 'lower-2'){
            $decision = "Lower 2";
        }elseif($id == 'full-body-1'){
            $decision = "Full Body Workout 1";
        }elseif($id == 'full-body-2'){
            $decision = "Full Body Workout 2";
        }elseif($id == 'home-push-1'){
            $decision = "Home Workout Push 1";
        }elseif($id == 'home-push-2'){
            $decision = "Home Workout Push 2";
        }elseif($id == 'home-pull-1'){
            $decision = "Home Workout Pull 1";
        }elseif($id == 'home-pull-2'){
            $decision = "Home Workout Pull 2";
        }elseif($id == 'home-leg-1'){
            $decision = "Home Workout Leg 1";
        }elseif($id == 'home-leg-2'){
            $decision = "Home Workout Leg 2";
        }elseif($id == 'home-upper'){
            $decision = "Home Workout Upper";
        }elseif($id == 'home-full-body-1'){
            $decision = "Home Workout Full Body 1";
        }elseif($id == 'home-full-body-2'){
            $decision = "Home Workout Full Body 2";
        }elseif($id == 'kardio'){
            $decision = "Kardio";
        }

        $exercise = Exercise::get();
        return view('dashboard.exercise_programs.create', [
            "title" => $decision,
            "active" => "programLatihan",
            "program_id" => $id,
            "exercise" => $exercise
        ]);
    }

    public function store(Request $request, $id)
    {
        if($id == 'push-1'){
            $decision = "Push 1";
        }elseif($id == 'push-2'){
            $decision = "Push 2";
        }elseif($id == 'pull-1'){
            $decision = "Pull 1";
        }elseif($id == 'pull-2'){
            $decision = "Pull 2";
        }elseif($id == 'leg-1'){
            $decision = "Leg 1";
        }elseif($id == 'leg-2'){
            $decision = "Leg 2";
        }elseif($id == 'upper-1'){
            $decision = "Upper 1";
        }elseif($id == 'upper-2'){
            $decision = "Upper 2";
        }elseif($id == 'lower-1'){
            $decision = "Lower 1";
        }elseif($id == 'lower-2'){
            $decision = "Lower 2";
        }elseif($id == 'full-body-1'){
            $decision = "Full Body Workout 1";
        }elseif($id == 'full-body-2'){
            $decision = "Full Body Workout 2";
        }elseif($id == 'home-push-1'){
            $decision = "Home Workout Push 1";
        }elseif($id == 'home-push-2'){
            $decision = "Home Workout Push 2";
        }elseif($id == 'home-pull-1'){
            $decision = "Home Workout Pull 1";
        }elseif($id == 'home-pull-2'){
            $decision = "Home Workout Pull 2";
        }elseif($id == 'home-leg-1'){
            $decision = "Home Workout Leg 1";
        }elseif($id == 'home-leg-2'){
            $decision = "Home Workout Leg 2";
        }elseif($id == 'home-upper'){
            $decision = "Home Workout Upper";
        }elseif($id == 'home-full-body-1'){
            $decision = "Home Workout Full Body 1";
        }elseif($id == 'home-full-body-2'){
            $decision = "Home Workout Full Body 2";
        }elseif($id == 'kardio'){
            $decision = "Kardio";
        }
        ExerciseProgram::create([
            'name' => $decision,
            'exercise_id' => $request->name,
            'sets'   => $request->sets,
            'reps' => $request->reps,
            'duration' => $request->duration
        ]);
        $namaLatihan = Exercise::where('id', $request->name)->pluck('name')[0];
        return redirect('/manager/program-latihan/'.$id)->with(['success' => $decision])->with(['decisionCreate' => $namaLatihan]);
    }

    public function edit($id, ExerciseProgram $exerciseProgram)
    {
        if($id == 'push-1'){
            $decision = "Push 1";
        }elseif($id == 'push-2'){
            $decision = "Push 2";
        }elseif($id == 'pull-1'){
            $decision = "Pull 1";
        }elseif($id == 'pull-2'){
            $decision = "Pull 2";
        }elseif($id == 'leg-1'){
            $decision = "Leg 1";
        }elseif($id == 'leg-2'){
            $decision = "Leg 2";
        }elseif($id == 'upper-1'){
            $decision = "Upper 1";
        }elseif($id == 'upper-2'){
            $decision = "Upper 2";
        }elseif($id == 'lower-1'){
            $decision = "Lower 1";
        }elseif($id == 'lower-2'){
            $decision = "Lower 2";
        }elseif($id == 'full-body-1'){
            $decision = "Full Body Workout 1";
        }elseif($id == 'full-body-2'){
            $decision = "Full Body Workout 2";
        }elseif($id == 'home-push-1'){
            $decision = "Home Workout Push 1";
        }elseif($id == 'home-push-2'){
            $decision = "Home Workout Push 2";
        }elseif($id == 'home-pull-1'){
            $decision = "Home Workout Pull 1";
        }elseif($id == 'home-pull-2'){
            $decision = "Home Workout Pull 2";
        }elseif($id == 'home-leg-1'){
            $decision = "Home Workout Leg 1";
        }elseif($id == 'home-leg-2'){
            $decision = "Home Workout Leg 2";
        }elseif($id == 'home-upper'){
            $decision = "Home Workout Upper";
        }elseif($id == 'home-full-body-1'){
            $decision = "Home Workout Full Body 1";
        }elseif($id == 'home-full-body-2'){
            $decision = "Home Workout Full Body 2";
        }elseif($id == 'kardio'){
            $decision = "Kardio";
        }
        $exercise = Exercise::all();
        return view('dashboard.exercise_programs.edit', [
            "title" => $decision,
            "program_id" => $id,
            "active" => "programLatihan",
            "exercise" => $exercise,
            'exerciseProgram' => $exerciseProgram
        ]);
    }

    public function update($id, Request $request, ExerciseProgram $exerciseProgram)
    {
        if($id == 'push-1'){
            $decision = "Push 1";
        }elseif($id == 'push-2'){
            $decision = "Push 2";
        }elseif($id == 'pull-1'){
            $decision = "Pull 1";
        }elseif($id == 'pull-2'){
            $decision = "Pull 2";
        }elseif($id == 'leg-1'){
            $decision = "Leg 1";
        }elseif($id == 'leg-2'){
            $decision = "Leg 2";
        }elseif($id == 'upper-1'){
            $decision = "Upper 1";
        }elseif($id == 'upper-2'){
            $decision = "Upper 2";
        }elseif($id == 'lower-1'){
            $decision = "Lower 1";
        }elseif($id == 'lower-2'){
            $decision = "Lower 2";
        }elseif($id == 'full-body-1'){
            $decision = "Full Body Workout 1";
        }elseif($id == 'full-body-2'){
            $decision = "Full Body Workout 2";
        }elseif($id == 'home-push-1'){
            $decision = "Home Workout Push 1";
        }elseif($id == 'home-push-2'){
            $decision = "Home Workout Push 2";
        }elseif($id == 'home-pull-1'){
            $decision = "Home Workout Pull 1";
        }elseif($id == 'home-pull-2'){
            $decision = "Home Workout Pull 2";
        }elseif($id == 'home-leg-1'){
            $decision = "Home Workout Leg 1";
        }elseif($id == 'home-leg-2'){
            $decision = "Home Workout Leg 2";
        }elseif($id == 'home-upper'){
            $decision = "Home Workout Upper";
        }elseif($id == 'home-full-body-1'){
            $decision = "Home Workout Full Body 1";
        }elseif($id == 'home-full-body-2'){
            $decision = "Home Workout Full Body 2";
        }elseif($id == 'kardio'){
            $decision = "Kardio";
        }
        $exerciseProgram->update([
            'exerciseProgram' => $decision,
            'exercise_id' => $request->name,
            'sets'   => $request->sets,
            'reps' => $request->reps,
            'duration' => $request->duration
        ]);

        return redirect('manager/program-latihan/'.$id)->with(['info' => $exerciseProgram->exercise->name])->with(['decision' => $decision]);
    }

    public function destroy($id, ExerciseProgram $exerciseProgram)
    {
        $exerciseProgram->delete();
        //redirect to index
        return redirect('/manager/program-latihan/'.$id)->with(['danger' => $exerciseProgram->exercise->name])->with(['decision' => $exerciseProgram->name]);
    }
}
