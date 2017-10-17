<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'company_name',
        'theme',
        'users_ticksol_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\UsersTicksol');
    }
}
