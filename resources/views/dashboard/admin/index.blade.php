@extends('dashboard.layout.main')

@section('container')

  <a href="/dashboard/posts/create" class="btn btn-danger">Create new category</a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">action</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>

            <td>
              <a href="/dashboard/categories/{{ $category->slug }}"
                class="btn btn-success"><i class="bi bi-eye"></i></a>

              <a href="/dashboard/categories/{{ $category->slug }}/edit"
                class="btn btn-warning"><i class="bi bi-pen"></i></a>

              <form onsubmit="return confirm('are you sure?')"
                action="/dashboard/categories/{{ $category->slug }}"
                class=" d-inline" method="post">
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
