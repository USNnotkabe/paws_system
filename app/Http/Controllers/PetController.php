<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', ['pets' => $pets]);
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pet_name' => 'required',
            'category' => 'required|in:dog,cat',
            'age' => 'nullable|integer|min:0',
            'breed' => 'nullable',
            'gender' => 'nullable|in:male,female',
            'color' => 'nullable',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'listing_type' => 'required|in:sell,adopt',
            'status' => 'required|in:available,adopted',
            'allergies' => 'nullable',
            'medications' => 'nullable',
            'food_preferences' => 'nullable',
        ]);

        // Set default for adopted if not provided
        // $data['adopted'] = $data['adopted'] ?? false;

        $newPet = Pet::create($data);
        return redirect(route('pets.index'))->with('success', 'Pet added successfully!');
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', ['pet' => $pet]);
    }

    public function update(Request $request, Pet $pet)
    {
        $data = $request->validate([
            'pet_name' => 'required',
            'category' => 'required|in:dog,cat',
            'age' => 'nullable|integer|min:0',
            'breed' => 'nullable',
            'gender' => 'nullable|in:male,female',
            'color' => 'nullable',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'listing_type' => 'required|in:sell,adopt',
            'status' => 'required|in:available,adopted',
            'allergies' => 'nullable|string',
            'medications' => 'nullable|string',
            'food_preferences' => 'nullable|string',
        ]);

        $pet->update($data);

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }
    public function show(Pet $pet)
    {

        return view('pets.show', ['pet' => $pet]);
    }


    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }

}