<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Comments</title>
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
            <i class="fas fa-comments me-2"></i> All Comments
        </h2>
        <a href="{{ route('admin.home') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
        </a>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Comments Table -->
    <div class="shadow-sm card">
        <div class="p-0 card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>User</th>
                            <th>Comment</th>
                            <th>Post Title</th>
                            <th>Created At</th>
                            <th style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @forelse($comments as $index => $comment)
    <tr>
        <td>{{ $index + $comments->firstItem() }}</td>
        <td>
            <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong><br>
            <small class="text-muted">{{ $comment->user->email ?? '-' }}</small>
        </td>
        <td style="max-width: 250px;">
            {{ Str::limit($comment->content, 100) }}
        </td>
        <td>
            <a href="{{ route('blog.show', $comment->post->id) }}" target="_blank">
                {{ Str::limit($comment->post->title, 50) }}
            </a>
        </td>
        <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
        @php
    $authUser = auth()->user();
@endphp

<td>
    @auth
  @if(auth()->user()->isAdmin() || auth()->id() === $comment->user_id)
    <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" onsubmit="return confirm('Are you sure?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
  @endif
@endauth
</td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="py-4 text-center text-muted">No comments found.</td>
    </tr>
    @endforelse
</tbody>
                </table>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Deleted!',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: true,
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
        timer: 3000,
        showConfirmButton: true,
    });
</script>
@endif
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $comments->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
