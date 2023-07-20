@extends('dashboard.layouts.main')

@section('container')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ">
      <h1 class="h2 my-0">Create Post</h1>
    </div>
    <hr />
    <a href="/dashboard/posts" class="btn btn-primary mb-3">Back to All Posts</a>
    
    <form action="/dashboard/posts" method="POST">
        <div class="col-lg-8 mb-4">

            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" disable readonly>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="custom-select" name="category_id">
                    <option selected disabled>Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
            </div>
            <label for="body">Content</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
    
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        
        title.addEventListener('change', function(){
          fetch('/dashboard/posts/checkSlug?title=' + title.value)
          .then( response => response.json())
          .then( data => slug.value = data.slug)
        })

        document.addEventListener('trixx-file-accept', function(e){
            e.preventDefault();
        });
      </script>
</main>

@endsection