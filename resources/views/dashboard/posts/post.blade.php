@extends('dashboard.layout.main')

@section('container')

  <div class="mt-3 col-md-8">
    <div class="card " style="--bs-gap:1rem">
      <img src="http://source.unsplash.com/1000x350/?cats" class="card-img-top"
        alt="dfd">
      <div class="card-body">

        <small>In:{{ $post->category->name }}</small>
        {!! $post->body !!}

        <a href="/dashboard/posts" class="btn btn-secondary">Back to posts</a>
      </div>
    </div>
  </div>

@endsection
