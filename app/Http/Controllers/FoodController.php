<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Food;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::latest()->search(request(['search']))->paginate(6)->withQueryString();

        return view('dashboard.foods.index', [
            'title' => 'Makanan',
            'active' => 'makanan',
            'foods' => $foods
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Food::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function create()
    {
        return view('dashboard.foods.create', [
            'title' => 'Tambah Makanan',
            'active' => 'makanan'
        ]);
    }

    public function store(StoreFoodRequest $request)
    {
        //Upload image
        $image = $request->file('image');

        if ($image) {
            $extension = $image->getClientOriginalExtension();
            $image->storeAs('public/makanan', $request->slug . '.' . $extension);
            $imageName = $request->slug;
        } else {
            $imageName = NULL;
            $extension = NULL;
        }

        Food::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'amount' => $request->amount,
            'unit' => $request->unit,
            'calory' => $request->calory,
            'protein' => $request->protein,
            'fat' => $request->fat,
            'carbohydrate' => $request->carbohydrate,
            'classification' => $request->classification,
            'image'  => $imageName,
            'extension'  => $extension,
            'recipe'  => $request->recipe,
        ]);

        return redirect('/manager/makanan')->with(['success' => $request->name]);
    }

    public function edit(Food $food)
    {
        return view('dashboard.foods.edit', [
            'title' => 'Ubah Makanan',
            'active' => 'makanan',
            'food' => $food
        ]);
    }

    public function update(UpdateFoodRequest $request, Food $food)
    {
        //Upload image
        $image = $request->file('image');

        if ($image) {
            if ($food->image) {
                Storage::delete('public/makanan/' . $food->image . '.' . $food->extension);
            }
            $imageName = $request->slug;
            $extension = $image->getClientOriginalExtension();
            $image->storeAs('public/makanan', $request->slug . '.' . $extension);
        } else {
            if ($food->image) {
                Storage::move('public/makanan/' . $food->image . '.' . $food->extension, 'public/makanan/' . $request->slug . '.' . $food->extension);
                $imageName = $request->slug;
                $extension = $food->extension;
            } else {
                $imageName = NULL;
                $extension = NULL;
            }
        }

        $food->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'amount' => $request->amount,
            'unit' => $request->unit,
            'calory' => $request->calory,
            'protein' => $request->protein,
            'fat' => $request->fat,
            'carbohydrate' => $request->carbohydrate,
            'classification' => $request->classification,
            'image'  => $imageName,
            'extension'  => $extension,
            'recipe'  => $request->recipe,
        ]);

        return redirect('/manager/makanan')->with(['info' => $request->name]);
    }

    public function destroy(Food $food)
    {
        if ($food->image) {
            Storage::delete('public/makanan/' . $food->image . '.' . $food->extension);
        }
        $food->delete();
        //redirect to index
        return redirect('/manager/makanan')->with(['danger' => $food->name]);
    }
}
