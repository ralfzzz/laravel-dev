@extends('dashboard.layouts.main')

@section('container')
    
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
      <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    </div>

    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
  </main>

@endsection
