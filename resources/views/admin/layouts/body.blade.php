@extends('layouts.main')

@section('body')
<div class="dark_bg text-bg-dark">
    
      <header class="p-3 text-bg-dark">
        <div class="container-fluid">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    
            <ul class="nav col-10 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="{{ route('index') }}" class="nav-link px-2 text-white">Home</a></li>
            </ul>
          </div>
        </div>
      </header>
      <div class="container-fluid d-flex">
        @include('admin.includes.sidebar')
        @yield('content')
    </div>
  </div>
@endsection
