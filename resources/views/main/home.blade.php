@extends('main.layout.main')

@section('container')
  @if (session()->has('logout'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('logout') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
    </div>
  @endif
  <h1 class="display-1 text-center mt-5"">{{ $title }}</h1>

@endsection
