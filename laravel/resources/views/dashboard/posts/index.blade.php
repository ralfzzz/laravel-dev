@extends('dashboard.layouts.main')

@section('container')
    
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
      <h1 class="h2 my-0">My Posts</h1>
    </div>
    <hr />

    
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>

    @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    @endif
    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-dark"> <span data-feather="eye"></span></a>
                    <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-warning"> <span data-feather="edit"></span></a>
                    <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-danger"> <span data-feather="x-circle"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </main>

@endsection
