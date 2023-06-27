{{-- @dd($posts) --}}

@extends('layouts.main')


@section('container')
    <h1>PAGE2 Dev</h1>
    @foreach ($posts as $item)
        {{-- @dd($item) --}}
        <section class="posts mb-5">
            <h3>
                <a href="/page2/{{ $item['slug'] }}">{{ $item['title'] }}</a>
            </h3>
            <h5> Author: {{ $item['author'] }}</h5>
            <p>{{ $item['content'] }}</p>
        </section>

    @endforeach
@endsection