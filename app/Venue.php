<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name',
                           'address_line_1',
                           'address_line_2',
                           'city',
                           'state',
                           'postcode',
                           'country',
                           'email',
                           'contact_num',
                           'capacity',
                           'wheelchair_access',
                           'parking',
                           'trains',
                           'trams',
                           'busses',
                           'taxi_uber',
                           'restaurants',
                           'pubs',
                           'website_url',
                           'user_id',
                           'pending'];

    public function creator()
    {
        return $this->belongsTo('App\UsersTicksol');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event')
               ->withPivot(['conduct_date', 'start_time', 'end_time']);;
    }

    public function events2()
    {
        return $this->belongsToMany('App\Event')
               ->withPivot(['conduct_date', 'start_time', 'end_time']);;
    }
}
