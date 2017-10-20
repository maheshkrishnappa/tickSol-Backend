<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function bookedBy()
    {
        return $this->belongsTo('App\UsersTicksol');
    }

    public function tickets()
    {
        return $this->belongsToMany('App\Ticket');
    }

    public function tickets1()
    {
        return $this->belongsToMany('App\Ticket');
    }
}
