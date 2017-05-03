<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketState extends Model
{
    protected $guarded = array('id');

    /**
     * Get the tickets with the selected state
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
