<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = array('id');

    protected $dates = array('closed_date');

    /**
     * Get the Ticket's User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     /**
     * Get the User assigned to the Ticket
     */
    public function assigned()
    {
        return $this->belongsTo('App\User', 'assigned_to', 'id');
    }
    /**
     * Get the Ticket's Comments
     */
    public function ticketComments()
    {
        return $this->hasMany('App\TicketComment');
    }

    /**
     * Get the Ticket's Contact
     */
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    /**
     * Get the Ticket's current State     
     */
    public function state()
    {
        return $this->belongsTo('App\TicketState');
    }
}
