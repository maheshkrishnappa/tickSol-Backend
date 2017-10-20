<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name',
                           'start_date',
                           'end_date',
                           'user_id',
                           'image_url'
       ];
    public function creator()
    {
        return $this->belongsTo('App\UsersTicksol');
    }

    public function venues()
    {
        return $this->belongsToMany('App\Venue')
               ->withPivot(['conduct_date', 'start_time', 'end_time']);
    }

    public function venues2()
    {
        return $this->belongsToMany('App\Venue')
               ->withPivot(['conduct_date', 'start_time', 'end_time']);
    }
}
