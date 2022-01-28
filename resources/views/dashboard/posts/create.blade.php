@extends('dashboard.layout.main')

@section('container')

  <div class="mt-3 col-md-8">
    <h2 class="display-3">Let's create something</h2>
    <div class="card " style="--bs-gap:1rem">
      <div class="card-body">
        <form action="/dashboard/posts" method="post">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <br />
            @error('title')
              <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="text" required autofocus
              class="form-control @error('title') is-invalid @enderror " id="title"
              name="title" value="{{ old('title') }}" placeholder="Title">
          </div>


          <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <br />
            @error('slug')
              <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="text" required
              class="form-control @error('slug') is-invalid @enderror " id="slug"
              name="slug" value="{{ old('slug') }}" placeholder="slug">
          </div>


          <div class="mb-3">
            <select class="form-select" name=" category_id">

              @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>
                    {{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}
                  </option>
                @endif
              @endforeach

            </select>
          </div>

          <div class="mb-3">
            <label for="body" class="form-label">Your article</label>
            <br />
            @error('body')
              <small class="text-danger">{{ $message }}</small>
            @enderror

            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>

          </div>


          <button type="submit" class="btn btn-info">Create</button>
        </form>
      </div>
    </div>
    <script src="{{ asset('js/slug.js') }}"></script>
  </div>

@endsection
