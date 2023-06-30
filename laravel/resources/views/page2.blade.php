{{-- @dd($posts) --}}

@extends('layouts.main')


@section('container')
    <h1>PAGE2 Dev</h1>
    @foreach ($posts as $item)
        {{-- @dd($item) --}}
        <section class="posts mb-5">
            <h3>
                <a href="/page2/{{ $item->slug }}">{{ $item->title }}</a>
            </h3>
            <h5> Author: {{ $item->excerpt }}</h5>
            <p>{{ $item->body }}</p>
        </section>

    @endforeach
@endsection