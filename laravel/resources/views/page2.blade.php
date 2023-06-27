{{-- @dd($posts) --}}

@extends('layouts.main')


@section('container')
    <h1>PAGE2 Dev</h1>
    @foreach ($posts as $item)
        {{-- @dd($item) --}}
        <section class="posts" style="margin-bottom: 10px; padding-bottom: 10px">
            <h3>{{ $item['title'] }}</h3>
            <h5> Author: {{ $item['author'] }}</h5>
            <p>{{ $item['content'] }}</p>
        </section>

    @endforeach
@endsection