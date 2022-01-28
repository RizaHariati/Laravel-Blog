@extends('main.layout.main')

@section('container')

  <div class="mt-3">
    <h1>{{ $title }}</h1>
    <div class="card " style="--bs-gap:1rem">
      <img src="http://source.unsplash.com/1000x350/?cats" class="card-img-top"
        alt="dfd">
      <div class="card-body">

        <small>By: <a class="text-info text-decoration-none"
            href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a>
          in: <a class="text-info text-decoration-none"
            href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
        </small>
        {!! $post->body !!}

        <a href="/posts" class="btn btn-secondary">Back to blogs</a>
      </div>
    </div>
  </div>

@endsection
