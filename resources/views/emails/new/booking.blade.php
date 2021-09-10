@component('mail::message')
# 3WA resto

Dear **{{ Auth::user()->name }}**

We are sending this message to let you know that we have revieved your booking and look forward to see you.<br>
you booking will be on **{{ $booking->booking_date->format('l, F jS Y') }}** at **{{date('H:i',strtotime($booking->booking_time))}}**.<br>
You will be **{{ $booking->number_of_seats }}** persons.

@component('mail::button', ['url' => route('bookings.show', $booking->id)])
Booking details
@endcomponent 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
