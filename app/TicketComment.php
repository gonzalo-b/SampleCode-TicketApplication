<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $guarded = array('id');

    /**
    * Get the Comment's Ticket
    */
    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    /**
     * Get the Author of the Comment
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
