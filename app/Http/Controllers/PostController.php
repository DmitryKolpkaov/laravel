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

        $posts = Post::all();

        return view('posts', compact('posts'));
    }

    /**
     * Create new object by table posts
     *
     * @return void
     */
    public function create(): void
    {
        $postsArr = [
              [
                  'title' => 'title of post from phpstorm',
                  'content' => 'some interesting content',
                  'image' => 'image.jpg',
                  'likes' => 20,
                  'is_published' => 1,
                  'created_at' => null,
                  'updated_at' => null
              ],

              [
                  'title' => 'another title of post from phpstorm',
                  'content' => 'another some interesting content',
                  'image' => 'another image.jpg',
                  'likes' => 50,
                  'is_published' => 1
              ]
        ];

        foreach ($postsArr as $item){
            Post::create($item);
        }


        dd('created');
    }

    /**
     * Updated
     *
     * @return void
     */
    public function update(): void
    {
        $post = Post::find(6);

        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 100,
            'is_published' => 0
        ]);

        dd('updated');
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
