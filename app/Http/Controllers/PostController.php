<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

        //Отношение один ко многим
//        $categories = Category::find(1);
//        $post = Post::find(3);
//        dd ($post->category);

        //Отношение многие ко многим
//        $post = Post::find(1);
//        $tag =Tag::find(1);
//        dd ($tag->posts);

        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Create new object by table posts
     *
     *
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
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

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function  edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Updated
     *
     *
     */
    public function update(Post $post)
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

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    /**
     * Deleted and restore
     *
     * @return void
     */
    public function delete(): void
    {
        //Удаление
//        $post = Post::find(2);
//        $post->delete();
//
//        dd ('deleted');

        //Восстановление
        $post = Post::withTrashed()->find(2);
        $post->restore();

        dd ('restore');
    }

    //Комбинированные запросы

    /**
     * firstOrCreate
     * Если title существует, то он его просто вернет
     * Если title не существует, то он создаст все указанные нами поля
     *
     * @return void
     */
    public function firstOrCreate(): void
    {

        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image.jpg',
            'likes' => 5000,
            'is_published' => 1
        ];

        $post = Post::firstOrCreate([
            'title' => 'some title phpstorm'
        ],[
            'title' => 'some title phpstorm',
            'content' => 'some content',
            'image' => 'some image.jpg',
            'likes' => 5000,
            'is_published' => 1
        ]);
        dump ($post->content);
        dd ('finished');
    }


    /**
     * updateOrCreate
     * Если title существует, то он его просто вернет и изменит какие то другие поля, если это нужно, выполнит update
     * Если title не существует, то он создаст все указанные нами поля
     *
     * @return void
     */
    public function updateOrCreate(): void
    {
        $anotherPost = [
            'title' => 'some title phpstorm',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate some image.jpg',
            'likes' => 500,
            'is_published' => 0
        ];

        $post = Post::updateOrCreate([
            'title' => 'some title phpstorm'
        ],[
            'title' => 'some title phpstorm',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate some image.jpg',
            'likes' => 500,
            'is_published' => 0
        ]);

        dump ($post->content);
    }
}
