@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <a href="{{route('post.show' , $post->id )}}" class="col-12 col-md-6 col-xl-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img style="height: 100%;" src="imgs/{{$post->img_url}}" class="img-fluid rounded-start" alt="{{$post->title}}">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{substr($post->content , 0 , 65)}}....</p>
                            <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
                        </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection