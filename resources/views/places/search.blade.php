@extends('layouts.app')
@section('title', 'Search Results')
@section('content')
<br><br><br><br><br>
<div class="container py-4">
    <h2 class="h4 text-center mb-4">Search Results</h2>

    @if($places->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark text-white">
                    <tr>
                        <th>Name (English)</th>
                        <th>Name (Myanmar)</th>
                      
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Map</th>
                        <th>More Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($places as $place)
                        <tr>
                            <td>{{ $place->poi_n_eng ?? 'No Name' }}</td>
                            <td>{{ $place->poi_n_myn3 ?? 'No Name' }}</td>
                            
                            <td>{{ $place->address ?? 'No Address' }}</td>
                            <td>{{ $place->phone ?? 'N/A' }}</td>
                            <td>
                                @if ($place->latitude && $place->longitude)
                                    <a href="https://www.google.com/maps?q={{ $place->latitude }},{{ $place->longitude }}"
                                       target="_blank"
                                       style="background-color: #007bff;
                                              color: white;
                                              font-size: 0.75rem;
                                              padding: 4px 8px;
                                              border-radius: 4px;
                                              text-decoration: none;
                                              display: inline-block;"
                                       onmouseover="this.style.backgroundColor='#0056b3'"
                                       onmouseout="this.style.backgroundColor='#007bff'">
                                        📍 View on Map
                                    </a>
                                @else
                                    <span class="text-muted">No location</span>
                                @endif
                            </td>
                             <td>
    <a href="{{ url('places/' . $place->id) }}"
       {{-- class="btn btn-sm btn-info text-white" --}}
           style="background-color: #007bff;
                                              color: white;
                                              font-size: 0.75rem;
                                              padding: 4px 8px;
                                              border-radius: 4px;
                                              text-decoration: none;
                                              display: inline-block;"
                                       onmouseover="this.style.backgroundColor='#0056b3'"
                                       onmouseout="this.style.backgroundColor='#007bff'">
        🔍 Detail
    </a>
</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $places->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    @else
        <p class="text-center text-muted">No results found.</p>
    @endif

  <div class="mt-4 d-flex justify-content-center">
    <a href="/"
       class="btn"
       style="background-color: #007bff; /* Bootstrap primary blue */
              color: white;
              font-size: 0.65rem;
              padding: 0.9rem 0.5rem;
              text-decoration: none;
              border-radius: 0.25rem;">
        ← Back
    </a>
</div>
</div>

@endsection
