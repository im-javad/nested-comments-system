@extends('layouts.app')

@section('content')
    <strong>{{$post->id}}</strong>
    <div>{{$post->title}}</div>
    <br><br>
    <strong>COMMENTS</strong>
    <hr>
    <div class="card">
        @foreach ($post->comments as $comment)
        <strong>{{$comment->user->name}}</strong>
            <p>{{$comment->content}}</p>
            <div class="ms-5">
                @foreach($comment->replies as $reply)
                    {{$reply->content}}
                    <br><br>
                @endforeach
                <form action="{{route('post.comment.reply.store' , [$post->id , $comment->id])}}" method="POST">
                    @csrf
                    <textarea class="w-100" name="content" id="" cols="30" rows="5"></textarea>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
            <hr>
        @endforeach
        COMMENT:
        <form action="{{route('post.comment.store' , $post->id)}}" method="POST">
            @csrf
            <textarea class="w-100" name="content" cols="30" rows="5"></textarea>
            @error('content')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection
