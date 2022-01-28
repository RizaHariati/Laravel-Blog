@extends("login.layout.main")

@section('container')
  <div class="card px-5 py-3">

    <form action="/registration" method="post">
      @csrf
      <img class="mb-4 rounded-circle " src="images/logo bulat.jpg" alt="" width="75" height="75">
      <h1 class="h3 mb-3 fw-normal">Registration Form</h1>

      <div class="form-floating">
        <input type="text" class="form-control  @error('name')is-invalid @enderror" id="name"
          value="{{ old('name') }}" name="name" placeholder="Your name..">
        <label for="name">Full Name</label>
      </div>
      @error('name')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <div class="form-floating">
        <input type="text" class="form-control  @error('username')is-invalid @enderror"
          value="{{ old('username') }}" id="username" name="username"
          placeholder="Your username..">
        <label for="username">User Name</label>
      </div>
      @error('username')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <div class="form-floating">
        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
          value="{{ old('email') }}" name="email" placeholder="name@example.com">
        <label for="email">Email address</label>
      </div>
      @error('email')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <div class="form-floating">
        <input type="password" class="form-control   @error('password')is-invalid @enderror"
          value="{{ old('password') }}" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
      @error('password')
        <small class="text-danger align-self-end">{{ $message }}</small>
        <br />
      @enderror
      <small>Already Registered? <a class="text-info" href="/login">Please Login</a></small>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </div>
@endsection
