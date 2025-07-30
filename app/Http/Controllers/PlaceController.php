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
public function edit($id)
{
    $poi = Place::findOrFail($id);
    return view('admin.edit', compact('poi'));
}
public function update(Request $request, $id)
{
    $poi = Place::findOrFail($id);

    $poi->poi_n_eng = $request->poi_n_eng;
    $poi->poi_n_myn3 = $request->poi_n_myn3;
    $poi->type = $request->type;
    $poi->address = $request->address;
    $poi->phone = $request->phone;
    $poi->latitude = $request->latitude;
    $poi->longitude = $request->longitude;

    $poi->save(); // <== Make sure this line is present

    return redirect()->route('admin.index')->with('success', 'POI updated.');
}

}
