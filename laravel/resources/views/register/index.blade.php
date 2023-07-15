@extends('layouts.main') 
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4 my-4">
        <main class="form-registration w-100 m-auto">
            <form class="login p-3">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <div class="form-floating">
                <input
                type="text"
                name="name"
                class="form-control"
                id="name"
                placeholder="Name"
                />
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating">
                <input
                type="text"
                name="username"
                class="form-control"
                id="username"
                placeholder="Username"
                />
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input
                type="email"
                name="email"
                class="form-control"
                id="email"
                placeholder="name@example.com"
                />
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input
                type="password"
                name="password"
                class="form-control"
                id="password"
                placeholder="Password"
                />
                <label for="floatingPassword">Password</label>
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
