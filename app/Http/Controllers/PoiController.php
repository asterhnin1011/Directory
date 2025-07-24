<?php

namespace App\Http\Controllers;

use App\Models\Poi;
use Illuminate\Http\Request;

class PoiController extends Controller
{
    // Show all POIs
    public function index(Request $request)
{
    $query = Poi::query();

    if ($request->filled('keyword')) {
        $query->where('poi_n_eng', 'like', '%' . $request->keyword . '%');
    }

    if ($request->filled('category')) {
        $query->where('type', $request->category);
    }

    $pois = Poi::all(); // or ->get() if you don't need pagination
dd($pois);
    return view('pages.index',['pois' => $pois])
        ->with('keyword', $request->keyword)
        ->with('category', $request->category);
}

    // Show create form
    // public function create()
    // {
    //     return view('pois.create');
    // }

    // Store a new POI
    public function store(Request $request)
    {
        $validated = $request->validate([
            'poi_n_eng' => 'required|string|max:255',
            'type' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        Poi::create($validated);

        return redirect()->route('pois.index')->with('success', 'POI created successfully!');
    }

    // Show a single POI
    public function show(Poi $poi)
    {
        return view('pois.show', compact('poi'));
    }

    // Show edit form
    public function edit(Poi $poi)
    {
        return view('pois.edit', compact('poi'));
    }

    // Update the POI
    public function update(Request $request, Poi $poi)
    {
        $validated = $request->validate([
            'poi_n_eng' => 'required|string|max:255',
            'type' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $poi->update($validated);

        return redirect()->route('pois.index')->with('success', 'POI updated successfully!');
    }

    // Delete a POI
    public function destroy(Poi $poi)
    {
        $poi->delete();
        return redirect()->route('pois.index')->with('success', 'POI deleted successfully!');
    }
}
