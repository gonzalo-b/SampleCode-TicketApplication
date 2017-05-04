<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketCommentRequest;
use App\TicketComment;
use Illuminate\Http\Request;

use App\Http\Requests;

class TicketCommentsController extends Controller
{
    public function store(Ticket $ticket, TicketCommentRequest $request)
    {
        /**
         * Store a newly created ticket comment in storage.
         *
         */
        TicketComment::create([
            'ticket_id' => $ticket->id,
            'user_id' => auth()->user()->id,
            'content' => $request->content
        ]);

        return back();
    }

    /**
     * Update the specified ticket comment in storage.
     *
     */
    public function update(TicketCommentRequest $request, Ticket $ticket, TicketComment $ticketComment)
    {
        $ticketComment->content =$request->input('content');
        $ticketComment->save();

        session()->put('success', 'Comment was successfully updated.');
        return back();
    }

    /**
     * Remove the specified ticket comment from storage.
     *
     */
    public function destroy(Ticket $ticket, TicketComment $comment)
    {
        $comment = TicketComment::find($comment->id);
        $comment->delete();

        return back();
    }
}
