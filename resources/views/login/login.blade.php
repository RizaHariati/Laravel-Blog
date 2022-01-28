@extends("login.layout.main")

@section('container')
  <div class="card p-5">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
          aria-label="Close"></button>
      </div>

    @elseif (session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
          aria-label="Close"></button>
      </div>

    @endif
    <form action="/login" method="post">
      @csrf
      <img class="mb-4 rounded-circle" src="images/logo bulat.jpg" alt="" width="75" height="75">
      <h1 class="h3 mb-3 fw-normal">Please Login</h1>

      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
          value="{{ old('email') }}" name="email" placeholder="name@example.com">
        <label for="email">Email address</label>
        @error('email')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>



      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror"" id="
          password" value="{{ old('password') }}" name="password" placeholder="Password">
        <label for="password">Password</label>
        @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>


      <small>Don't have any account? <a class="text-info" href="/registration">Register
          here</a></small>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </div>
@endsection
