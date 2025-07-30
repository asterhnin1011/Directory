<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit POI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome (optional icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 1rem;
        }
        .card-body {
            background: #fff;
            border-radius: 1rem;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Edit Point of Interest</h2>
<div class="card shadow">
        <div class="card-body p-4">
            <form action="{{ route('admin.update', $poi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
    <label for="poi_n_eng" class="form-label">POI Name Eng</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-landmark"></i>
        </span>
        <input
            type="text"
            name="poi_n_eng"
            id="poi_n_eng"
            class="form-control"
            placeholder="Enter place name"
            value="{{ old('poi_n_eng', $poi->poi_n_eng ?? '') }}"
            required
        >
    </div>
    <div class="form-text">E.g., Shwe Dagon Pagoda, Sakura Hospital, etc.</div>
</div>
<div class="mb-3">
    <label for="poi_n_myn3" class="form-label">POI Name Myanmar</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-landmark"></i>
        </span>
        <input
            type="text"
            name="poi_n_myn3"
            id="poi_n_myn3"
            class="form-control"
            placeholder="Enter place name"
            value="{{ old('poi_n_myn3', $poi->poi_n_myn3 ?? '') }}"
            required
        >
    </div>
    <div class="form-text">ဥပမာ-ရွှေတိဂုံစေတီတော်၊ဒက္ခိဏဒီပါဆေးရုံ အစရှိသဖြင့်</div>
</div>

               <div class="mb-3">
    <label for="type" class="form-label">Category</label>
    <select name="type" id="type" class="form-select" required>
        <option value="">-- Select Category --</option>
        <option value="Restaurant" {{ old('type', $poi->type ?? '') == 'Restaurant' ? 'selected' : '' }}>Restaurant</option>
        <option value="Hospital" {{ old('type', $poi->type ?? '') == 'Hospital' ? 'selected' : '' }}>Hospital</option>
        <option value="School" {{ old('type', $poi->type ?? '') == 'School' ? 'selected' : '' }}>School</option>
        <option value="Hotel" {{ old('type', $poi->type ?? '') == 'Hotel' ? 'selected' : '' }}>Hotel</option>
        <option value="Market" {{ old('type', $poi->type ?? '') == 'Market' ? 'selected' : '' }}>Market</option>
        <option value="Other" {{ old('type', $poi->type ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>

                <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-map-marker-alt"></i>
        </span>
        <textarea
            name="address"
            id="address"
            class="form-control"
            rows="3"
            placeholder="Enter full address (e.g. No.123, Insein Road, Yangon)"
            required>{{ old('address', $poi->address ?? '') }}</textarea>
    </div>
    <div class="form-text">Include street, city, and region if available.</div>
</div>

               <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-phone-alt"></i>
        </span>
        <input
            type="tel"
            name="phone"
            id="phone"
            class="form-control"
            placeholder="e.g. +95912345678"
            value="{{ old('phone', $poi->phone ?? '') }}"
            pattern="^\+?[0-9\s\-]{7,15}$"
        >
    </div>
    <div class="form-text">Include country code, e.g., +959 for Myanmar numbers.</div>
</div>

               <div class="mb-3">
    <label class="form-label">Coordinates</label>
    <div class="row g-2">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-map-pin"></i>
                </span>
                <input
                    type="text"
                    name="latitude"
                    id="latitude"
                    class="form-control"
                    placeholder="Latitude (e.g. 16.8661)"
                    value="{{ old('latitude', $poi->latitude ?? '') }}"
                    required
                >
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-map-pin"></i>
                </span>
                <input
                    type="text"
                    name="longitude"
                    id="longitude"
                    class="form-control"
                    placeholder="Longitude (e.g. 96.1951)"
                    value="{{ old('longitude', $poi->longitude ?? '') }}"
                    required
                >
            </div>
        </div>
    </div>
    <div class="form-text">Enter valid latitude and longitude coordinates.</div>
</div>

                <div class="d-flex justify-content-between">
                    <a href="/admin" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update POI
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
