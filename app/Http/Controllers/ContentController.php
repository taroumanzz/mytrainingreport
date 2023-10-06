<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Content;

class ContentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'weight' => 'required',
            'freq' => 'required',
        ], [
            'weight.required' => '部位は入力必須です。',
            'freq.required' => '種目は入力必須です。',
        ]);

        $content = new Content();
        $content->post_id = $post->id;
        $content->weight = $request->weight;
        $content->freq = $request->freq;
        $content->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()
            ->route('posts.show', $content->post);
    }
}
