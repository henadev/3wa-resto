@extends('layouts.app')

@section('content')
<div class="container">

        <div>
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div >
                <div >
                   <h2>List  Meals</h2> 
                </div>
               <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
          @foreach ($meals as $meal)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ $meal->photo }}" alt="">

              <div class="card-body">
                  <h3>{{ $meal->name }}</h3>
                <p class="card-text">{{ $meal->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Show details</button>
                  </div>
                  <small class="text-muted">{{ $meal->sell_price }} €</small>
                </div>
              </div>
            </div>
          </div>
          @endforeach
      </div>

            </div>
            {{ $meals->links() }}
        </div>
    </div>
    @endsection
  
