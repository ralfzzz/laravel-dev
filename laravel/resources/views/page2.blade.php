{{-- @dd($posts) --}}

@extends('layouts.main')


@section('container')
    <h1>{{ $title }}</h1>
    @foreach ($posts as $item)
        {{-- @dd($item) --}}
        <section class="posts mb-5 border-bottom pb-3">
            <h3>
                <a href="/page2/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
            </h3>
            <p class="text-decoration-none">Author: <a href="/authors/{{ $item->author->username }}">{{ $item->author->name }}</a></p>
            <p class="text-decoration-none">Category: <a href="/categories/{{ $item->category->slug }}" class="text-decoration-none"> {{ $item->category->name }}</a></p>
            <h5> {{ $item->excerpt }}</h5>
            <a href="/page2/{{ $item->slug }}" class="text-decoration-none">Read more...</a>
        </section>

    @endforeach
@endsection