@extends('layouts.app')

@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{route('bookings.store')}}"  method="POST">
    @csrf
    <label for="datebooking"><strong>Date Booking :</strong></label>
    <input type="Date" name="bookingdate" class="form-control @error('bookingdate'){{ 'is-invalid' }}@enderror" value="{{ old('bookingdate') }}">
    @error('bookingdate')
        <div class="text-danger">{{ $message }}</div>
    @enderror

<br>
    <label for="time"><strong>Time :</strong></label>
    <input type="time" name="bookingtime" class="form-control @error('bookingtime'){{ 'is-invalid' }}@enderror " value="{{ old('bookingtime') }}">
    @error('bookingtime')
    <div class="text-danger">{{ $message }}</div>
    @enderror

<br>
    <label for="number_of_seats"><strong>Number of seats :</strong></label>
    <input type="number"  min="1" max="10" name="bookingseasts"  class="form-control @error('bookingseasts'){{ 'is-invalid' }}@enderror " value="{{ old('bookingseasts') }}">
    @error('bookingseasts')
    <div class="text-danger">{{ $message }}</div>
    @enderror

<br> 
<button class="btn btn-primary">Submit</button>
</form>


@endsection