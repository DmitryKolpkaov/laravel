@extends('layouts.main')

@section('database')
    <h1>This is posts from database</h1>
    <div>
            <div>{{$post->id}}. {{$post->title}}</div>
            <div>{{$post->content}}</div>
    </div>
    <hr>
    <div>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary mt-3">Edit</a>
    </div>
    <div>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger mt-3" type="submit" value="Delete">
        </form>
    </div>
    <div>
        <a href="{{route('post.index')}}" class="btn btn-primary mt-3">Back</a>
    </div>
@endsection
