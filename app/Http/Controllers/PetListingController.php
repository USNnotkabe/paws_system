<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Pet::query();

        // Category filter
        if ($request->category) {
            $query->where('category', $request->category);
        }

        // Search filter
        if ($request->search) {
            $query->where('pet_name', 'like', '%' . $request->search . '%');
        }

        $pets = $query->get(); // Execute the query with filters applied

        return view('petlisting.index', compact('pets'));
    }
}