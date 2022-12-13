<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::latest()->paginate(5);

        return view('dashboard.food.index', [
            'title' => 'Makanan',
            'active' => 'makanan',
            'foods' => $food
        ]);
    }

    public function create()
    {
        return view('dashboard.food.create', [
            'title' => 'Tambah Makanan',
            'active' => 'makanan'
        ]); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'calory'     => 'required',
            'protein'     => 'required',
        ]);
        Food::create([
            'name'     => $request->name,
            'calory'     => $request->calory,
            'protein'     => $request->protein
        ]);
        return redirect()->route('food.index');
    }

    public function edit(Food $food)
    {
        return view('dashboard.food.edit', [
            'title' => 'Ubah Makanan',
            'active' => 'makanan',
            'food' => $food
        ]);
    }

    public function update(Request $request, Food $food)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required',
            'calory'   => 'required',
            'protein'   => 'required'
        ]);

        $food->update([
            'name'     => $request->name,
            'calory'   => $request->calory,
            'protein'   => $request->protein
        ]);

        return redirect()->route('food.index');
    }

    public function destroy(Food $food)
    {
        $food->delete();

        //redirect to index
        return redirect()->route('food.index');
    }
}
