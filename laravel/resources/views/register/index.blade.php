@extends('layouts.main') 
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4 my-4">
        <main class="form-registration w-100 m-auto">
            <form class="login p-3" action="/register" method="POST" >
                @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <div class="form-floating">
                <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="Name"
                value="{{ old('name') }}"
                required
                />
                <label for="floatingInput">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input
                type="text"
                name="username"
                class="form-control @error('username') is-invalid @enderror"
                id="username"
                placeholder="Username"
                value="{{ old('username') }}"
                required
                />
                <label for="floatingInput">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                placeholder="name@example.com"
                value="{{ old('email') }}"
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
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                placeholder="Password"
                required
                />
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">
                Register
            </button>
            <div class="mt-3 d-flex justify-content-center">
                <small>Already registered? <a href="/login">Login now!</a></small>
            </div>
        </form>
    </div>
    </main>
</div>
@endsection
