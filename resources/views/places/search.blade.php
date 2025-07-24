@extends('layouts.app')
@section('title', 'Search Results')
@section('content')
<div class="slider-area">
<br><br><br><br>
<div class="container py-4">
    <h2 class="text-2xl md:text-3xl font-bold text-white text-center mb-6 px-6 py-3 rounded-lg bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 shadow-lg">
  🔍 Search Results
</h2>

    @if($places->count())
        <div class="table-responsive" style="max-width: 900px; margin: 0 auto;">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark text-white">
                    <tr>
                        <th>Name(English)</th>
                        <th>Name(Myanmar)</th>
                        <th>Type</th>
                        <th>More Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($places as $place)
                        <tr>
                            <td>{{ $place->poi_n_eng ?? 'No Name' }}</td>
                            <td>{{ $place->poi_n_myn3 ?? 'No Name' }}</td>
                            <td>{{ $place->type ?? 'No Type' }}</td>
                             <td>
    <a href="{{ url('places/' . $place->id) }}"
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

        <!-- Pagination -->
<div class="mt-4 d-flex justify-content-center">
    @if ($places->hasPages())
        <nav>
            <ul class="pagination pagination-sm">
                {{-- Previous --}}
                @if ($places->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $places->appends(request()->query())->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Pages --}}
                @foreach ($places->links()->elements[0] as $page => $url)
                    @if ($page == $places->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}&{{ http_build_query(request()->query()) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($places->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $places->appends(request()->query())->nextPageUrl() }}" rel="next">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </nav>
    @endif
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
</div>

@endsection
