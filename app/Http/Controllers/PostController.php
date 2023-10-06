<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('index')
            ->with(['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show')
            ->with(['post' => $post]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'part' => 'required',
            'event' => 'required',
        ], [
            'part.required' => '部位は入力必須です。',
            'event.required' => '種目は入力必須です。',
        ]);

        $post = new Post();
        $post->part = $request->part;
        $post->event = $request->event;
        $post->save();

        return redirect()
            ->route('posts.index');
    }
}
