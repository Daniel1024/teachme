<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Http\Requests;

class TicketsController extends Controller
{
    public function latest()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')
            ->paginate(20);
        return view('tickets.list', compact('tickets'));
    }

    public function popular()
    {
        return view('tickets.list');
    }

    public function open()
    {
        $tickets = Ticket::where('status', 'open')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        return view('tickets.list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = Ticket::where('status', 'closed')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        return view('tickets.list', compact('tickets'));
    }

    public function details($id)
    {
        /*$comments = TicketComment::select('comment', 'user_id', 'created_at')
            ->with(['user' => function ($q) {
                $q->select('id', 'name');
            }])
            ->where('ticket_id', $ticket->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(20);*/
        //dd($comments[0]->toArray());
        $ticket = Ticket::findOrFail($id);
        return view('tickets.details', compact('ticket'));
    }

}
