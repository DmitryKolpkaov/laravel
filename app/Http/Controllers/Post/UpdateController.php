<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title'=> 'string',
            'content'=> 'string',
            'image'=> 'string',
            'category_id'=> 'string'
        ]);
        $post->update($data);

        return redirect()->route('post.show', $post->id);
    }
}
