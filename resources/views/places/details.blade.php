<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Poi details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .info-card {
      border-radius: 1rem;
    }

    .info-item {
      padding: 1rem;
      background-color: #ffffff;
      border-radius: 0.75rem;
      border: 1px solid #dee2e6;
      margin-bottom: 1rem;
    }

    .info-icon {
      font-size: 1.25rem;
      color: #0d6efd;
      margin-right: 0.75rem;
      flex-shrink: 0;
    }

    @media (max-width: 576px) {
      .info-item {
        padding: 0.75rem;
      }
      .info-icon {
        font-size: 1rem;
        margin-right: 0.5rem;
      }
      h5 {
        font-size: 1rem;
      }
      .fs-5 {
        font-size: 1rem !important;
      }
    }
    .marquee-container {
    overflow: hidden;
    white-space: nowrap;
    position: relative;
}

.marquee-content {
    display: inline-block;
    padding-left: 100%;
    animation: scroll-left 30s linear infinite;
}

@keyframes scroll-left {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-100%);
    }
}
  </style>
</head>
<body>
<div class="marquee-container bg-primary text-white py-2">
    <div class="marquee-content">
        🌊 Welcome to Directory Website! ⚓ &nbsp;&nbsp;&nbsp;
        🌊  Welcome to Directory Website! ⚓
    </div>
</div>
<div class="container py-4">
     <h2 class="mb-4 text-primary text-center">📍 Point of Interest Details</h2>
  <div class="row">
    <div class="col-md-6"> <!-- adjust col size as needed -->
      <div class="card shadow-lg border-0 info-card bg-primary text-white" style="max-width: 100%;">
        <div class="card-body p-4">
          <div class="info-item">

            <!-- English Name -->
            <div class="d-flex align-items-center mb-2 flex-wrap">
              <i class="bi bi-geo-alt-fill info-icon"></i>
              <h5 class="me-2 mb-0 text-muted">Name (English):</h5>
              <p class="fs-5 mb-0 text-dark">{{ $place->poi_n_eng ?? 'No Name' }}</p>
            </div>

            <!-- Myanmar Name -->
            <div class="d-flex align-items-center mb-2 flex-wrap">
              <i class="bi bi-translate info-icon"></i>
              <h5 class="me-2 mb-0 text-muted">Name (Myanmar):</h5>
              <p class="fs-5 mb-0 text-dark">{{ $place->poi_n_myn3 ?? 'No Name' }}</p>
            </div>

            <!-- Type -->
            <div class="d-flex align-items-center mb-2 flex-wrap">
              <i class="bi bi-tag info-icon"></i>
              <h5 class="me-2 mb-0 text-muted">Type:</h5>
              <p class="fs-5 mb-0 text-dark">{{ $place->type ?? 'No Type' }}</p>
            </div>

            <!-- Address -->
            <div class="d-flex align-items-center mb-2 flex-wrap">
              <i class="bi bi-geo-alt info-icon"></i>
              <h5 class="me-2 mb-0 text-muted">Address:</h5>
              <p class="fs-5 mb-0 text-dark">{{ $place->address ?? 'No Address' }}</p>
            </div>

            <!-- Phone -->
            <div class="d-flex align-items-center mb-2 flex-wrap">
              <i class="bi bi-telephone info-icon"></i>
              <h5 class="me-2 mb-0 text-muted">Phone:</h5>
              <p class="fs-5 mb-0 text-dark">{{ $place->phone ?? 'N/A' }}</p>
            </div>

            <!-- Location -->
            <div class="d-flex align-items-center mb-2 flex-wrap">
              <i class="bi bi-map info-icon"></i>
              <h5 class="me-2 mb-0 text-muted">Location:</h5>
              @if ($place->latitude && $place->longitude)
                <a href="https://www.google.com/maps?q={{ $place->latitude }},{{ $place->longitude }}"
                   target="_blank"
                   class="btn btn-outline-primary btn-sm rounded-pill ms-2 mt-2">
                  🌍 View on Google Map
                </a>
              @else
                <p class="text-muted mb-2">No location available</p>
              @endif
            </div>

            <!-- More Info -->
            <div class="d-flex align-items-start mt-3">
              <i class="bi bi-info-circle info-icon"></i>
              <div>
                <h5 class="mb-1 text-muted">More Info:</h5>
                <p class="fs-5 mb-0 text-dark">{{ $place->info ?? 'No additional information.' }}</p>
              </div>
            </div>

          </div>

          <!-- Back Button -->
         <a href="{{ url()->previous() }}" class="btn btn-light mt-3 rounded-pill px-4 text-primary">← Back to result</a>

        </div>
      </div>
    </div>
    <!-- RIGHT: QR Code -->
  <div class="col-md-4 d-flex align-items-start justify-content-center mt-4 mt-md-0">
    <div class="text-center">
      <h5 class="text-muted mb-3">📱 Scan to View</h5>
      <div class="bg-white p-3 rounded shadow">
       @if(isset($qrCode))
    {!! $qrCode !!}
@else
    <p>QR Code not available.</p>
@endif
      </div>
    </div>
  </div>
  </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; {{ date('Y') }} City Directory. All rights reserved.</p>
    </footer>
</body>
</html>
