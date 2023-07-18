@extends('layouts.main') 
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4 my-4">
        <main class="form-signin w-100 m-auto">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <form class="login p-3" action="/login" method="POST">
                @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            
            <div class="form-floating">
                <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                placeholder="name@example.com"
                name="email"
                value="{{ old('email') }}"
                autofocus
                required
                />
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input
                type="password"
                class="form-control"
                id="password"
                placeholder="Password"
                name="password"
                required
                />
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">
                Login
            </button>
            <div class="mt-3 d-flex justify-content-center">
                <small>Not registered? <a href="/register">Register now!</a></small>
            </div>
        </form>
    </div>
    </main>
</div>
@endsection
