<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $guarded = array('id');

    /**
     * Get the Contact's Ticket
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    /**
     * Get the Contact's Full Name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Sanitize Phone Number
     */
    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['phone_number'] = preg_replace('/\D/', '', $value);
    }
}
