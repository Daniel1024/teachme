<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

use TeachMe\Entities\Ticket;
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

    public function details(Ticket $ticket)
    {
        return view('tickets.details', compact('ticket'));
    }

}
