@extends('layouts.main')

@section('content')
    <div class="text">
        <div>
            <h2>{{$post->title}}</h2>
        </div>
        <div>
            <p>{{$post->content}}</p>
        </div>
        <div>
            <p class="p text-lowercase">{{$post->image}}</p>
        </div>
        <div>
            <p>{{'Likes: ' . $post->likes . '. '}} {{'Is published - ' . $post->is_published}}</p>
        </div>
    </div>
    <div>
        <a class="btn btn-primary" href="{{ route('post.index') }}">Back to all</a>
        <a class="btn btn-success ms-3" href="{{ route('post.edit', compact('post')) }}">Edit post</a>
    </div>
    <div>
        <form action="{{ route('post.destroy', compact('post')) }}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger mt-3" type="submit" value="Delete post">
        </form>
    </div>
@endsection()
