<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function index()
    {
        // Load comments with related user and post, latest first, paginated
        $comments = Comment::with(['user', 'post'])->latest()->paginate(7);

        // Return your view and pass the comments
        return view('admin.viewcomment', compact('comments'));
    }

    public function __construct()
    {
        // Require auth for storing comments
        $this->middleware('auth')->only(['store']);
    }

    // Store a new comment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ]);

        // Get the logged-in user
        $user = Auth::user();

        // Create the comment
        $comment = Comment::create([
            'post_id' => $validated['post_id'],
            'user_id' => auth()->id(),
            'username' => auth()->user()->name,
            'content' => $validated['content'],
            'comment_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
//     public function destroy(Comment $comment)
// {
//     $user = auth()->user();

//     // Only the owner or admin can delete
//     if ($comment->user_id !== $user->id && !$user->is_admin) {
//         return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
//     }

//     $comment->delete();

//     return redirect()->back()->with('success', 'Comment deleted successfully.');
// }
public function destroy(Comment $comment)
{
    $user = auth()->user();

    // If not admin and not the comment owner, deny
    if (!$user->isAdmin() && $comment->user_id !== $user->id) {
        return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
    }

    $comment->delete();

    return redirect()->back()->with('success', 'Comment deleted successfully.');
}

}
