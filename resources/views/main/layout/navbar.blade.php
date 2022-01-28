<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">

    <a class="navbar-brand " href="/">My Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ $active === 'home' ? 'active' : '' }}"
            aria-current="page" href="/">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link  {{ $active === 'posts' ? 'active' : '' }}"
            href="/posts">Posts</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
              <li><a class="dropdown-item"
                  href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
              </li>
            @endforeach
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Authors </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($users as $user)

              <li><a class="dropdown-item"
                  href="/posts?user={{ $user->username }}">{{ $user->name }}</a>
              </li>
            @endforeach

          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link  {{ $active === 'about' ? 'active' : '' }}"
            href="/about">About</a>
        </li>
      </ul>

      @auth()
        <div class="dropdown col-md-8 ms-auto">
          <button class="btn btn-outline-light dropdown-toggle" type="button"
            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome {{ auth()->user()->name }}!
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="/logout">logout</a></li>
          </ul>
        </div>
      @else
        <div class="col-md-8 d-flex justify-content-start justify-content-lg-end">
          <a class="nav-item text-right btn btn-outline-light " href="/login"><i
              class="bi bi-box-arrow-in-right" style="margin-right: 5px"></i>Login</a>
        </div>
      @endauth


    </div>
  </div>
</nav>
