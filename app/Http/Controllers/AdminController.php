<?php

namespace App\Http\Controllers;

// use Validator;
use App\Models\Poi;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PoisImport;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pois = Cache::remember('pois_all', 300, function () {
            // dd('$pois');
            return Poi::select('id', 'poi_n_eng', 'type', 'address', 'phone', 'longitude', 'latitude', 'remark', 'verify_dat', 'poi_pictur', 'postal_cod')
                ->latest()
                ->get();
        });
        return view('admin.home', compact('pois'));
    }
    
    public function testing()
    {
        dd('hello');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());


        // dd($validated);

        $poi = Poi::create($request->all());
        $poi['created_by'] = $poi->id;
        $poi['fid'] = $poi->id;
        $poi->save();

        if ($poi) {
            Cache::forget('pois_all'); // Clear the cache so new POI will show up
            return back()->with('success', 'Poi created successfully.');
        } else {
            return back()->with('error', 'Poi not created.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Poi::all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $poi = Poi::findOrfail($id);
        //dd($poi);
        if ($poi->delete()) {
            Cache::forget('all_pois'); // Clear the cache so new POI will show up
            return back()->with('success', 'Poi deleted successfully.');
        } else {
            return back()->with('error', 'Poi not deleted.');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        try {
            Excel::import(new PoisImport, $request->file('file'));
        } catch (\Exception $e) {
            Log::error('Import failed: ' . $e->getMessage());
            return back()->with('error', 'Import failed. Please check logs.');
        }

        Cache::forget('all_pois');
        return back()->with('success', 'Excel imported successfully!');
    }
}