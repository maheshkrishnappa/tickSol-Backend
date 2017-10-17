<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    protected $fillable = [
        'name',
        'is_enabled'
    ];
    public function users()
    {
        return $this->belongsToMany('App\UsersTicksol');
    }
}
