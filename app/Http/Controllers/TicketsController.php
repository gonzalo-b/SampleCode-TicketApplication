<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Ticket;
use App\TicketComment;
use Illuminate\Http\Request;

use App\Http\Requests;

class TicketsController extends Controller
{

    /**
     * Display a listing of the tickets.
     */
    public function index()
    {
        return view('tickets.index');
    }

    /**
     * Show the form for creating a new ticket.
     *
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Display the specified ticket.
     *
     */
    public function show($ticket)
    {
        $data['ticket'] = $ticket;

        return view('tickets.show', $data);
    }

    /**
     * Store a newly created ticket in storage.
     *
     */
    public function store(TicketRequest $request)
    {
        $ticket = new Ticket($request->all());
        
        // Set State to New
        $ticket->state_id = 1;

        $ticket->save();

        session()->put('success', 'Ticket was successfully created.');
        return redirect('tickets');
    }

    /**
     * Show the form for editing the specified ticket.
     *
     */
    public function edit(Ticket $ticket)
    {
        $data['ticket'] = $ticket;
        return view('tickets.edit', $data);
    }

    /**
     * Update the specified ticket in storage.
     *
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        session()->put('success', 'Ticket was successfully updated.');

        return redirect('tickets');
    }

    /**
     * Remove the specified ticket from storage.
     *
     */
    public function destroy(Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        $ticket->delete();

        // Change Ticket State & add Close date

        session()->put('success', 'Ticket was successfully deleted.');
        return redirect('tickets');
    }
}
