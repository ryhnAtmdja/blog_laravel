<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link {{ $title === "Home" ? "active" : "" }}" href="/">Home</a>
        </li>
        <li class="nav-item {{ $title === "About" ? "active" : ""  }}">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item {{ $title === "All Blogs Posts" ? "active" : ""  }}">
          <a class="nav-link" href="/blogs">Blogs</a>
        </li>
        <li class="nav-item {{ $title === "Author" ? "active" : ""  }}">
          <a class="nav-link" href="/authors">Authors</a>
        </li>
        <li class="nav-item {{ $title === "Category" ? "active" : ""  }}">
          <a class="nav-link" href="/category">Category</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/dashboard">Dashboard</a>
              <form action="/logout" method="POST">
                @csrf
                  <button class="dropdown-item" type="submit" name="logout">
                    Logout
                  </button>
              </form>
            </div>
          </li>
          @else
          <li class="nav-item {{ $title === "Login" ? "active" : ""  }}">
              <a class="nav-link" href="/login">Login</a>
            </li>
        @endauth
      </ul>
    </nav>
