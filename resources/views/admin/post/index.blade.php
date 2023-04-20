@extends('layouts.admin')

@section('content')
    <div>
        <div>
            <div>
                <a class="btn btn-primary mb-3" href="{{route('post.create')}}">Creat new post</a>
            </div>
            @foreach($posts as $post)
                <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
            @endforeach

            <div class="mt-3">
                {{ $posts->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
