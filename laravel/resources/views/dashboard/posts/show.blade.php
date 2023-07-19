@extends('dashboard.layouts.main')

@section('container')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

            <div class="row d-flex justify-content-center my-4">
                <div class="col-8">
                    <section class="posts">
                        <h3>{{ $post->title }}</h3>
                        <a href="/dashboard/posts" class="btn btn-primary mt-3">Back to All My Posts</a>
                        <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" class="card-img-top my-2 img-fluid" alt="hero">
                        <p>{!! $post->body !!}</p>
                    </section>
                </div>
            </div>
    </div>
</main>

@endsection