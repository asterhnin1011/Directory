<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PlaceController extends Controller
{
        public function search(Request $request)
{
    $query = $request->input('query');
    $type = $request->input('type');

    $places = Place::query();

    if ($query) {
        $places->where('poi_n_eng', 'like', '%' . $query . '%')
            ->orWhere('poi_n_myn3', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->orWhere('type', 'like', '%' . $query . '%');
    }

    if ($type) {
        $places->where('type', $type);
    }

    $places = $places->paginate(5);

    return view('places.search', compact('places'));
}

    public function details($id)
{
    $place = Place::findOrFail($id);
    return view('places.details', compact('place'));
}
public function show($id)
{
    $place = Place::findOrFail($id); // Get the place record

    $url = route('places.details', $id); // Generate URL
    $qrCode = QrCode::size(200)->generate($url);

    return view('places.details', [
        'qrCode' => $qrCode,
        'place' => $place
    ]);
}

}
