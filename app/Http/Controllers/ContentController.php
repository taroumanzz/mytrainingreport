<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Content;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{
    public function store(ContentRequest $request, Post $post)
    {
        $content = new Content();
        $content->post_id = $post->id;
        $content->weight = $request->weight;
        $content->freq = $request->freq;
        $content->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function editContent(Content $content)
    {
        return view('contents.editContent')
            ->with(['content' => $content]);
    }

    public function update(ContentRequest $request, Content $content)
    {
        $content->weight = $request->weight;
        $content->freq = $request->freq;
        $content->save();

        return redirect()
            ->route('posts.show', $content->post);
    }

    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()
            ->route('posts.show', $content->post);
    }
}
