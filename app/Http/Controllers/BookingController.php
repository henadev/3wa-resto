<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Mail\NewBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bookings=Booking::All();
        // return view('booking.index',compact('bookings'));
        // return Auth::user()->bookings()->get(); verification

        // $coming_bookings =  Auth::user()->bookings()->where('booking_date', '>=' ,  now())->get();
        // $coming_bookings =  Auth::user()->bookings()->where('booking_date', '<' ,  now())->get();

        $coming_bookings =  Auth::user()->bookings()->ComingBookings()->get();
        $passed_bookings =  Auth::user()->bookings()->PassedBookings()->get();
        return view('booking.index', [
            'coming_bookings' =>  $coming_bookings,
            'passed_bookings' =>  $passed_bookings
        ]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        
        $request->validate($this->validationRules());

    $booking = new Booking();
    $booking->booking_date = $request->bookingdate;
    $booking->booking_time = $request->bookingtime;
    $booking->number_of_seats = $request->bookingseasts;
    $booking->user_id = Auth::id();
    $booking->save();

    Mail::to(Auth::user()->email)->send(new NewBooking($booking));

    return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $OneBooking=Booking::with('user')->Find($id);
        return view('booking.show',compact('OneBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $OneBooking=Booking::with('user')->Find($id);
    return view('booking.edit',compact('OneBooking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request, Booking $booking)
    {
         
        $request->validate([
            'booking_date' => 'required|after:today|date',
            'booking_time' => 'required',
            'number_of_seats' => 'required|integer|min:1|max:12',
        ]);
    
// solution1
//         $booking->booking_date = $request->Date;
//         $booking->booking_time = $request->Time;
//         $booking->number_of_seats = $request->Nbseats;
//         $booking->save();
// solution 2
        $booking->update($request->all());
        return redirect()->route('bookings.show',  $booking->id)->with('success',   'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
            $booking->delete();
            return redirect()->route('bookings.index',  $booking->id)->with('success',   'Booking deleted successfully');
    }




    private function validationRules()
    {
        return [
            'bookingdate' => 'required|after:today|date',
            'bookingtime' => 'required',
            'bookingseasts' => 'required|integer|min:1|max:12',
        ];
    }
}
