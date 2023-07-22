@extends('dashboard.layouts.main')

@section('container')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ">
      <h1 class="h2 my-0">Create Post</h1>
    </div>
    <hr />
    
    <div class="col-lg-8 mb-4">
        <a href="/dashboard/posts" class="btn btn-primary mb-3">Back to All Posts</a>
        
        <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" autofocus required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" disable readonly required>
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="custom-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option selected disabled>Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Post Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">

                <label for="body">Content</label>
                <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror" value="{{ old('body') }}" required>
                @error('body')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Create Post</button>
        </form>
    </div>
    
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