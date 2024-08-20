<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show all posts in the admin panel
        // Fetch all posts from the database and pass them to the view
        $posts = Posts::all();

        if(auth()->user()->role == 'admin') {
            return view('admin.post.index', compact('posts'));
        }else if(auth()->user()->role == 'author') {
            return view('author.post.index', compact('posts'));
        }
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
        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Store the post to the database
        Posts::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => now(),
            'username' => auth()->user()->username,
        ]);

        // Redirect back to the index page with a success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        // Find the post by ID
        $post = Posts::findOrFail($id);

        // Delete the post from the database
        $post->delete();

        // Redirect back to the index page with a success message
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
