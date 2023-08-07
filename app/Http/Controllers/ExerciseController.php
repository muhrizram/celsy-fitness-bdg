<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::search(request(['search']))->paginate(10)->withQueryString();

        $skipped = ($exercises->currentPage() * $exercises->perPage()) - $exercises->perPage();

        return view('dashboard.exercises.index', [
            'title' => 'Gerakan Latihan',
            'active' => 'latihan',
            'number' => $skipped,
            'exercises' => $exercises,
            'exercises_mobile' => $exercises
        ]);
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Exercise::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function create()
    {
        return view('dashboard.exercises.create', [
            'title' => 'Tambah Gerakan Latihan',
            'active' => 'latihan'
        ]);
    }

    public function store(StoreExerciseRequest $request)
    {
        $replaced = Str::replaceArray('watch?v=', ['embed/'], $request->video_exercise);
        Exercise::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'muscle_group' => $request->muscle_group,
            'exercise_video' => $replaced
        ]);

        return redirect('/manager/gerakan-latihan')->with(['success' => $request->name]);
    }

    public function edit(Exercise $exercise)
    {
        $replaced = Str::replaceArray('embed/', ['watch?v='], $exercise['exercise_video']);
        return view('dashboard.exercises.edit', [
            'title' => 'Ubah Gerakan Latihan',
            'active' => 'latihan',
            'exercise' => $exercise,
            'exercise_video' => $replaced
        ]);
    }
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        $replaced = Str::replaceArray('watch?v=', ['embed/'], $request->video_exercise);
        $exercise->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'muscle_group' => $request->muscle_group,
            'exercise_video' => $replaced
        ]);

        return redirect('/manager/gerakan-latihan')->with(['info' => $request->name]);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        //redirect to index
        return redirect('/manager/gerakan-latihan')->with(['danger' => $exercise->name]);
    }
}
