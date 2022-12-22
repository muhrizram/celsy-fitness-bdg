<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::latest()->paginate(5);

        return view('dashboard.exercise.index', [
            'title' => 'Latihan',
            'active' => 'latihan',
            'exercises' => $exercises
        ]);
    }

    public function create()
    {
        return view('dashboard.exercise.create', [
            'title' => 'Tambah Latihan',
            'active' => 'latihan'
        ]); 
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required',
            'category'     => 'required',
        ]);

        //create post
        Exercise::create([
            'name'     => $request->name,
            'category'   => $request->category
        ]);

        //redirect to index
        return redirect()->route('exercises.index');
    }

    public function edit(Exercise $exercise)
    {
        return view('dashboard.exercise.edit', [
            'title' => 'Ubah Latihan',
            'active' => 'latihan',
            'exercise' => $exercise
        ]);
    }

    public function update(Request $request, Exercise $exercise)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required',
            'category'   => 'required'
        ]);

        $exercise->update([
            'name'     => $request->name,
            'category'   => $request->category
        ]);

        return redirect()->route('exercises.index');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        //redirect to index
        return redirect()->route('exercises.index');
    }
}
