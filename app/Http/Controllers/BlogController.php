<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //
     // Show the blog homepage or list of posts
   public function index()
{
    $posts = Post::all(); // or ->get() if you don't want pagination
    return view('blog.index', compact('posts')); // Make sure to use 'posts'
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
    $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
]);
    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('posts', 'public');
    }

    \App\Models\Post::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'image' => $path,
    ]);

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
    // dd($post);
// dd($post->user_id);
// dd(auth()->id());
    if (auth()->id() !== $post->user_id) {
        abort(403);
    }
    // else {
        // dd(true);

         $validated = $request->validate([
        'title' => 'string|max:255',
        'description' => 'string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    // dd($request->all());
    // }

    $post->update([
        'title' => $validated['title'],
        'description' => $validated['description'],
    ]);
    // dd('he');

    // dd($validated);
// dd($post);
    if ($request->hasFile('image')) {

        // Optional: delete old image
       if ($post->image && Storage::exists('public/' . $post->image)) {
            Storage::delete('public/' . $post->image);
        }

        $path = $request->file('image')->store('posts', 'public');
        // $post->image = $path;
        $post->update(['image' => $path]);
    }
    // $post->title = $validated['title'];
    // $post->description = $validated['description'];
    // $post->save();

    return redirect()->route('blog.show', $post->id)
                     ->with('success', 'Post updated successfully!');
}
}
