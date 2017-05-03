<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = array('id');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the Tickets of the User
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    /**
     * Get the User's Full Name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
}
