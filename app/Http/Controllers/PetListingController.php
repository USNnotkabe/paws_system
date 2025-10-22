<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetListingController extends Controller
{
    // GET /api/petlisting - List all pets
    public function index(Request $request)
    {
        $query = Pet::query();

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->search) {
            $query->where('pet_name', 'like', '%' . $request->search . '%');
        }

        $pets = $query->get();
        return response()->json($pets);
    }

    // GET /api/petlisting/{id} - Get single pet
    public function show($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json([
                'success' => false,
                'message' => 'Pet not found'
            ], 404);
        }

        return response()->json($pet);
    }

    // POST /api/petlisting - Create new pet
    public function store(Request $request)
    {
        $validated = $request->validate([
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

        $pet = Pet::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pet created successfully',
            'data' => $pet
        ], 201);
    }

    // PUT /api/petlisting/{id} - Update pet
    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json([
                'success' => false,
                'message' => 'Pet not found'
            ], 404);
        }

        $validated = $request->validate([
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

        $pet->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pet updated successfully',
            'data' => $pet
        ]);
    }

    // DELETE /api/petlisting/{id} - Delete pet
    public function destroy($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json([
                'success' => false,
                'message' => 'Pet not found'
            ], 404);
        }

        $pet->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pet deleted successfully'
        ]);
    }
}