@extends('main.layout.main')

@section('container')


  @if ($posts->count() < 1)
    <h1 class="mt-3">{{ $title }}</h1>
  @else
    <h1 class="mt-3">{{ $title }}</h1>

    <form action="/posts">
      <div class="input-group mb-3">

        @if (request('category'))
          <input type="hidden" value="{{ request('category') }}" name="category" />

        @endif

        @if (request('user'))
          <input type="hidden" value="{{ request('user') }}" name="user" />
        @endif

        <input type="text" class="form-control" value="{{ request('search') }}"
          placeholder="Search..." name="search" id=search>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
      </div>
    </form>
    <div class="card mb-3">
      <img src="http://source.unsplash.com/1000x350/?cats" class="card-img-top" alt="dfd">
      <div class="card-body">
        <h5 class="display-2">{{ $posts[0]->title }}</h5>
        <p>By: <a class="text-info text-decoration-none"
            href="/posts?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
          in: <a class="text-info text-decoration-none"
            href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
        </p>

        <p class="lead">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-secondary">Read more</a>
      </div>
    </div>

    <div class="row">
      @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
          <div class="card " style="--bs-gap:1rem">
            <img src="http://source.unsplash.com/150x150/?{{ $post->category->slug }}"
              class="card-img-top" alt="dfd">
            <div class="card-body">
              <h5 class="display-3">{{ $post->title }}</h5>
              <small>By: <a class="text-info text-decoration-none"
                  href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a>
                in: <a class="text-info text-decoration-none"
                  href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
              </small>

              <p>{{ $post->excerpt }}</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-secondary">Read more</a>
            </div>
          </div>
        </div>
      @endforeach
      <div class="row justify-content-center">
        <div class="col-md-3"> {{ $posts->links() }}</div>
      </div>
    </div>
  @endif


@endsection
