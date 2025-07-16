<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
        public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        $places = Place::query()
            ->when($query, fn($q) =>
                $q->where('poi_n_eng', 'like', '%' . $query . '%')
                    ->orWhere('poi_n_myn3', 'like', '%' . $query . '%')
                  ->orWhere('address', 'like', '%' . $query . '%')
                  ->orWhere('ward_n_eng', 'like', '%' . $query . '%')
            )
                ->paginate(5);
            // ->when($category, fn($q) =>
            //     $q->where('type', $category)
            // )
            // ->get();

        return view('places.search', compact('places'));
    }
    public function details($id)
{
    $place = Place::findOrFail($id);
    return view('places.details', compact('place'));
}

}
