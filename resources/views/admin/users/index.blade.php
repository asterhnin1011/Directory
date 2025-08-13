@extends('layouts.app') {{-- Adjust layout if yours is different --}}

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .page-header {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f5ff;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <!-- Page Header -->
    <div class="mb-4 d-flex justify-content-between align-items-center page-header">
        <h2 class="mb-0 text-primary">
            <i class="fas fa-users me-2"></i> Registered Users
        </h2>
        <a href="{{ route('admin.home') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-3 row">
        <div class="col-md-6">
            <form method="GET" action="{{ route('admin.users.index') }}">
                <div class="shadow-sm input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name or email..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Users Table -->
    <div class="shadow-sm card">
        <div class="p-0 card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration + ($users->firstItem() - 1) }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-muted">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $users->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
