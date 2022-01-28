@extends('dashboard.layout.main')

@section('container')

  <a href="/dashboard/posts/create" class="btn btn-danger">Create new post</a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">action</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
              <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-success"><i
                  class="bi bi-eye"></i></a>

              <a href="/dashboard/posts/{{ $post->slug }}/edit"
                class="btn btn-warning"><i class="bi bi-pen"></i></a>

              <form onsubmit="return confirm('are you sure?')"
                action="/dashboard/posts/{{ $post->slug }}" class=" d-inline"
                method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i
                    class="bi bi-trash"></i></button>

              </form>
            </td>
          </tr>

        @endforeach
      </tbody>
    </table>
  </div>
@endsection
