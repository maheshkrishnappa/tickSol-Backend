<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function bookings()
    {
        return $this->belongsToMany('App\Booking');
    }
}
