@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{session('success')}}
</div>
@endif


<section class="row mb-4">
<div class="col-md-6">
  <h2 class="text-primary">Bookings List</h2>
</div>

<div class="col-md-6 d-flex justify-content-end">
  <a href="{{ route('bookings.create') }}"   class="btn btn-primary col-md-6  ">+Add Booking</a>
</div>
</section>

       
       <section class="row">
        <div class="col-6">
          <h3>Coming bookings</h3>
          <ul class="list-group">
        
              @foreach ($coming_bookings as $booking)  
              {{-- @if ($booking->booking_date > date("Y-m-d"))  --}}
              <a href="{{ route('bookings.show',$booking->id) }}">
              <li class="list-group-item list-group-item-action text-dark ">
                Your bookings will be for the <strong >{{ date('d/m/Y', strtotime($booking->booking_date)) }}</strong>
                at <strong>{{ $booking->booking_time }}</strong>
                for <strong>{{ $booking->number_of_seats }}</strong> persons.
              </li>
             </a>
               
                <br>
                {{-- @endif  --}}
              @endforeach
         
          </ul>
    </div>


    
    <div class="col-6">
      <h3>Coming bookings</h3>
      <ul class="list-group">
        @foreach ($passed_bookings as $booking)  
        {{-- @if ($booking->booking_date < date("Y-m-d"))  --}}
        <li class="list-group-item list-group-item-action">
          Your bookings will be for the <strong>{{ date('d/m/Y', strtotime($booking->booking_date)) }}</strong>
          at <strong>{{ $booking->booking_time }}</strong>
          for <strong>{{ $booking->number_of_seats }}</strong> persons.
          <br>
          {{-- @endif  --}}
        @endforeach
   
    </ul>
    </div>
    
  </section>
@endsection