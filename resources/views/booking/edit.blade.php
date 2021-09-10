@extends('layouts.app')

@section('content')

 <h3>Modify Booking</h3>

 <br>

<form action="{{route('bookings.update',$OneBooking->id)}}"  method="post">
    @csrf
    @method('PATCH')
  
    <label for="date">Date :</label>
    <input type="text" name="booking_date"   value="{{ $OneBooking->booking_date->format('Y/m/d') }}">
    @error('Date')
    <div class="text-danger">{{ $message }}</div>
    @enderror

<br>
    <label for="time">Time :</label>
    <input type="time" name="booking_time"   value="{{ $OneBooking->booking_time}}">
    @error('Time')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <br>
    <label for="nbseats">Number of seats :</label>
    <input type="number" name="number_of_seats"   value="{{ $OneBooking->number_of_seats}}">
    @error('Nbseats')
    <div class="text-danger">{{ $message }}</div>
    @enderror

<br>
    <button>Submit</button>
</form>



@endsection