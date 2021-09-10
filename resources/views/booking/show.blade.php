@extends('layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{session('success')}}
</div>
@endif

        <h3>One Booking list</h3>
        
      <ul class="list-group">
            <li class="list-group-item list-group-item-action">Name : {{  $OneBooking->user->name  }}</li>
            <li class="list-group-item list-group-item-action">Phone : {{  $OneBooking->user->phone  }}</li>
            <li class="list-group-item list-group-item-secondary">DATE : {{  date('d/m/Y', strtotime($OneBooking->booking_date))  }}</li>
            <li class="list-group-item list-group-item-success">TIME : {{  $OneBooking->booking_time  }}</li>
            <li class="list-group-item list-group-item-danger">NUMBER OF SEATS : {{  $OneBooking->number_of_seats  }}</li>
            <li class="list-group-item list-group-item-warning">N° USER : {{  $OneBooking->user_id  }}</li>
            <br>
           
      </ul>
      <a href="{{ route('bookings.edit',$OneBooking->id)  }}" class="btn btn-warning">Edit</a>
      <a href="#" data-toggle="modal" data-target="#modaldelet" class="btn btn-warning"  >Delete</button>


      <form action="{{ route('bookings.destroy',$OneBooking->id)  }}" method="post" id="deleteForm">
      @csrf
      @method('DELETE')
      <div class="modal"  id="modaldelet">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                  <p>vous etes sure de supprimer </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary"  onclick="document.querySelector('#deleteForm').submit()">Save changes</button>
                </div>
              </div>
            </div>
          </div>

      </form>

      
      {{-- <a href="{{ route('bookings.destroy',$OneBooking->id)  }}" class="btn btn-danger">Delete</a> --}}


@endsection