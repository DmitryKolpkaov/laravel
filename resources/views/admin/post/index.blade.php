@extends('layouts.admin')

@section('content')
    <div>
        <br>
        <div>
            <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Add new post</a>
        </div>
        <hr>
        @foreach($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
            <br>
        @endforeach
        <hr>
        <div>
            {{$posts->links()}}
        </div>
    </div>
@endsection
