<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'title'=> 'required | string',
            'content'=> 'required | string',
            'image'=> 'required | string',
            'category_id'=> 'required | string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }
}
