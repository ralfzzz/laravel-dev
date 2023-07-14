@extends('layouts.main')

@section('container')

    {{-- <div class="container"> --}}
        <div class="row d-flex justify-content-center my-4">
            <div class="col-8">
                <section class="posts">
                    <h3>{{ $posts->title }}</h3>
                    <img src="https://source.unsplash.com/1200x300?{{ $posts->category->name }}" class="card-img-top my-2 img-fluid" alt="hero">
                    <small>
                        <p>Author: <a href="/authors/{{ $posts->author->username }}" class="text-decoration-none"> {{ $posts->author->name }} </a> in <a href="/page2?category={{ $posts->category->slug }}" class="text-decoration-none">{{ $posts->category->name }}</a></p>
                    </small>
                    <p>{!! $posts->body !!}</p>
                </section>
                <a href="/page2/" class="btn btn-primary mt-3">Back to Posts</a>
            </div>
        </div>
    {{-- </div> --}}

    {{-- @dd($item) --}}
    {{-- <section class="posts mb-5">
        <p><a href="/categories/{{ $posts->category->slug }}">{{ $posts->category->name }}</a></p>
        <h3>{{ $posts->title }}</h3>
        <h5> Author: {{ $posts->author->name }}</h5>
        <p>{!! $posts->body !!}</p>
    </section>

    <a href="/page2/">Back</a> --}}

@endsection