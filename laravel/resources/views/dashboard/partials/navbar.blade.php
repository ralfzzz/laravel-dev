<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">MY DASHBOARD</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="nav-link btn btn-danger py-1 px-3"><i class="bi bi-door-closed-fill "></i>Logout</button>
          {{-- <a class="dropdown-item" href="#"></a> --}}
        </form>
      </li>
    </ul>
  </nav>