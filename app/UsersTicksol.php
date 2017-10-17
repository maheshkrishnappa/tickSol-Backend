<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersTicksol extends Model
{
    protected $fillable = ['name',
                           'email',
                           'password'];

    public function venuesCreated()
    {
        return $this->hasMany('App\Venue');
    }

    public function eventsCreated()
    {
        return $this->hasMany('App\Event');
    }

    public function bookingsMade()
    {
        return $this->hasMany('App\Booking');
    }

    public function settings()
    {
        return $this->hasOne('App\Settings');
    }

    public function pluginsApplied()
    {
        return $this->belongsToMany('App\Plugin');
    }
}
