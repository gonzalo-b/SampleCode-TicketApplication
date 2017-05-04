<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStateRequest;
use App\TicketState;
use Illuminate\Http\Request;

use App\Http\Requests;

class TicketStatesController extends Controller
{
    /**
     * Display a listing of the ticket states.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('states.index');
    }

    /**
     * Show the form for creating a new ticket state.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('states.ticket.create');
    }

    /**
     * Store a newly created ticket state in storage.
     *
     * @param TicketStateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStateRequest $request)
    {
        $ticketState = new TicketState($request->all());
        $ticketState->save();

        session()->put('success', 'Ticket State was successfully created.');
        return redirect('ticket-states');
    }

    /**
     * Show the form for editing the specified ticket state.
     *
     * @param TicketState $ticketState
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketState $ticketState)
    {
        $data['state'] = $ticketState;
        return view('states.ticket.edit', $data);
    }

    /**
     * Update the specified ticket state in storage.
     *
     * @param TicketStateRequest $request
     * @param TicketState $state
     * @return \Illuminate\Http\Response
     * @internal param $TicketStateRequest
     */
    public function update(TicketStateRequest $request, TicketState $state)
    {
        $state->update($request->all());
        $state->save();

        session()->put('success', 'Ticket State was successfully updated.');
        return redirect('ticket-states');
    }

    /**
     * Remove the specified ticket state from storage.
     *
     * @param  int  $ticketState
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketState $ticketState)
    {
        $ticketState = TicketState::find($ticketState->id);
        if($ticketState->locked){
            session()->put('error', 'This Ticket State is locked.');
        }else{
            $ticketState->delete();
            session()->put('success', 'Ticket State was successfully deleted.');
        }

        return view('states.ticket.index');
    }
}
