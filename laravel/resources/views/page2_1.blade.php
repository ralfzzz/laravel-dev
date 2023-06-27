@extends('layouts.main')

@section('container')

    {{-- @dd($item) --}}
    <section class="posts mb-5">
        <h3>{{ $posts['title'] }}</h3>
        <h5> Author: {{ $posts['author'] }}</h5>
        <p>{{ $posts['content'] }}</p>
    </section>

    <a href="/page2/">Back</a>

@endsection