@extends('layouts.main')

@section('container')
    <h1>PAGE3 Dev</h1>

    @foreach($posts as $item)
    <section class="posts mb-5">

        <h3>{{ $item['title'] }}</h3>
        <h5>Author: {{ $item['excerpt'] }}</h5>
        <p>{{ $item['body'] }}</p>
    </section>

    @endforeach
@endsection