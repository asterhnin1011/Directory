<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{

     // Show the blog homepage or list of posts
    public function index(Request $request)
    {
        $search = $request->input('search');
         $posts = Post::query()
        ->when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(6)
        ->appends(['search' => $search]);
        $latestPosts = Post::orderBy('id', 'desc')->take(4)->get();
    return view('blog.index', compact('posts','latestPosts'));
    }
    // Show a single blog post
    public function show($id)
{
    $post = Post::findOrFail($id);

    return view('blog.show', compact('post'));
}
    // Store a newly created post
    public function create()
{
    return view('blog.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
    $validated['image'] = $request->file('image')->store('posts', 'public');
}

    $validated['user_id'] = auth()->id();

    \App\Models\Post::create($validated);

    return redirect()->route('blog.index')->with('success', 'Post created successfully.');
}
    public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
}

public function edit($id)
{
    $post = Post::findOrFail($id);

    if (auth()->id() !== $post->user_id) {
        abort(403); // Forbidden
    }
// dd($post->image);
    return view('blog.edit', compact('post'));
}

public function destroy(Post $post)
{
    if (auth()->user()->isAdmin()) {
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Post deleted.');
    }

    if (auth()->id() !== $post->user_id) {
        abort(403);
    }

    $post->delete();
    return redirect()->route('blog.index')->with('success', 'Post deleted.');
}

 public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    if (auth()->id() !== $post->user_id) {
        abort(403);
    }
         $validated = $request->validate([
        'title' => 'string|max:255',
        'description' => 'string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);


    $post->update([
        'title' => $validated['title'],
        'description' => $validated['description'],
    ]);
    if ($request->hasFile('image')) {

        // Optional: delete old image
       if ($post->image && Storage::exists('public/' . $post->image)) {
            Storage::delete('public/' . $post->image);
        }

        $path = $request->file('image')->store('posts', 'public');
        // $post->image = $path;
        $post->update(['image' => $path]);
    }

    return redirect()->route('blog.show', $post->id)
                     ->with('success', 'Post updated successfully!');
}
public function postListing()
{
    $user = auth()->user();

    // Get only posts created by the logged-in user, sorted by latest
    $posts = Post::where('user_id', $user->id)
                 ->orderBy('created_at', 'desc')
                 ->paginate(6);  // paginate if needed

    return view('myposts.postlisting', compact('posts'));
}
}
