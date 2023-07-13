@extends('layouts.main')


@section('container')
    <h1>All Category</h1>
    <div class="row my-4">

        @foreach ($categories as $item)
        {{-- @dd($item) --}}
        {{-- <h2><a href="/categories/{{ $item->slug }}">{{ $item->name }}</a></h2> --}}
        <div class="col-4">
            <a href="/categories/{{ $item->slug }}">
                <div class="card text-bg-dark text-center">
                    <img src="https://source.unsplash.com/300x300?{{ $item->name }}" class="card-img" alt="category image">
                    <div class="card-img-overlay d-flex p-0" >
                        <h3 class="card-title align-self-center flex-fill p-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $item->name }}</h3>
                    </div>
                </div>
            </a>
        </div>
        
        @endforeach

    </div>
@endsection