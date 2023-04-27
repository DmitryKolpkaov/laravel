<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::all();
//        $data = [];
//        foreach($posts as $post) {
//            $data[] = [
//                dump($post->title)
//            ];
//        }
//
//        dd($posts);

//        $posts = Post::where('is_published', 1)->get();
//        $data = [];
//        foreach($posts as $post){
//            $data[] = [
//                'id' => $post->id,
//                'title' => $post->title
//            ];
//        }
//
//        dd($data);

//        $post = Post::where('id', 1)->get()[0];
//        $data[] = [
//            'id' => $post->id,
//            'title' => $post->title,
//            'content' => $post->content
//        ];
//
//        dd($data);

        $post = Post::where('is_published', 1)->first();
        dump ($post->title);
    }
}
