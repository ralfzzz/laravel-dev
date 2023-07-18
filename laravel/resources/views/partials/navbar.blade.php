<div class="container" style="background-color: #002F7B">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link {{ ($title === 'Home')? 'active' : '' }}">Home</a></li>
        <li class="nav-item"><a href="/page" class="nav-link {{ ($title === 'Page')? 'active' : '' }} ">Page</a></li>
        <li class="nav-item"><a href="/page2" class="nav-link {{ ($title === 'All Posts')? 'active' : '' }}">All Posts</a></li>
        <li class="nav-item"><a href="/category" class="nav-link {{ ($title === 'All Category')? 'active' : '' }}">All Category</a></li>
        {{-- <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li> --}}
      </ul>
      @auth
      <div class="dropdown">
        <a class="btn btn-danger dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Welcome, {{ auth()->user()->name }}
        </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-book-half"></i>Dashboard</a></li>
        <li><hr class="dropdown-devider"></li>
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item"><i class="bi bi-door-closed-fill "></i>Logout</button>
            {{-- <a class="dropdown-item" href="#"></a> --}}
          </form>
        </li>
      </ul>
      </div>
      @else
        
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/login" class="nav-link {{ ($title === 'Login' || $title === 'Register')? 'active' : '' }}"><i class="bi bi-door-open-fill"></i>Login</a></li>
      </ul>
      @endauth
    </header>
  </div>