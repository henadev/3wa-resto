<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{

    protected $dates = [
        'booking_date' ,
    ];
    // protected $fillable = ['booking_date', 'booking_time', 'number_of_seats']; 
    protected $guarded = ['user_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeComingBookings($query){
        return $query->where('booking_date', '>=' ,  now());
    }

    public function scopePassedBookings($query){
        return $query->where('booking_date', '<' ,  now());
    }
}
