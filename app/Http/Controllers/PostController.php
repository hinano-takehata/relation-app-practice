<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts =Post::with('tags')->withCount('comments');

        if ($request->has('tag')) {
            $tagName = $request->tag;
            $posts->whereHas('tags', function ($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }
        $posts = $posts->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
