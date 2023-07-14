{{-- @dd($posts) --}}

@extends('layouts.main')


@section('container')
    <h1 class="text-center mb-3">{{ $title }}</h1>

    {{-- <div class="row justify-content-center">
        <div class="col-6">
            <form action="/page2">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div> --}}

    @if($posts->count())
            <div class="card my-4 text-center">
                <img src="https://source.unsplash.com/1200x300?{{ $posts[0]->category->name }}" class="card-img-top" alt="hero">
                <div class="card-body">
                    <h5 class="card-title"><a href="/page2/{{ $posts[0]->slug }}" class="text-decoration-none">{{ $posts[0]->title }}</a></h5>
                    <small>
                        <p class="mb-2">Author: <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none"> {{ $posts[0]->author->name }} </a> in <a href="/page2?category={{ $posts[0]->category->slug }}" class="text-decoration-none"> {{ $posts[0]->category->name }}</a> | Last updated {{ $posts[0]->updated_at->diffForHumans() }}</p>
                        <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    </small>
                    <a href="/page2/{{ $posts[0]->slug }}" class="btn btn-primary mt-3">Read more</a>
                </div>
            </div>

    <div class="row">
    @foreach($posts->skip(1) as $item)

            <div class="col-4 mb-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="position-absolute px-3 py-2 text-light" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/page2?category{{ $item->category->slug }}" class="text-decoration-none"> {{ $item->category->name }}</a></div>
                    <img src="https://source.unsplash.com/300x150?{{ $item->category->name }}" class="card-img-top" alt="card image">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/page2/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a></h5>
                        <small><p class="mb-2">Author: <a href="/authors/{{ $item->author->username }}" class="text-decoration-none"> {{ $item->author->name }} </a> | Last updated {{ $item->updated_at->diffForHumans() }}</p></small>
                        <p class="card-text">{{ $item->excerpt }}</p>
                        <a href="/page2/{{ $item->slug }}" class="btn btn-primary">Read more..</a>
                    </div>
                </div>
            </div>        
    @endforeach
    </div>
    

    {{-- @foreach ($posts as $item) --}}
        {{-- @dd($item) --}}
        {{-- <section class="posts mb-5 border-bottom pb-3">
            <h3>
                <a href="/page2/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
            </h3>
            <p class="text-decoration-none">Author: <a href="/authors/{{ $item->author->username }}">{{ $item->author->name }}</a></p>
            <p class="text-decoration-none">Category: <a href="/categories/{{ $item->category->slug }}" class="text-decoration-none"> {{ $item->category->name }}</a></p>
            <h5> {{ $item->excerpt }}</h5>
            <a href="/page2/{{ $item->slug }}" class="text-decoration-none">Read more...</a>
        </section> --}}

    {{-- @endforeach --}}

        @else
        <p class="text-center fs-5">No post found!</p>
        @endif
    
@endsection