@extends('layouts.main')


@section('container')
    <h1>All Category</h1>
    @foreach ($categories as $item)
        {{-- @dd($item) --}}
        <h2><a href="/categories/{{ $item->slug }}">{{ $item->name }}</a></h2>

    @endforeach
@endsection