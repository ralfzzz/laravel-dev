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
    </header>
  </div>