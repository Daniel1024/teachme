<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;

class TicketsController extends Controller
{
    public function latest()
    {
        return view('tickets.list');
    }

    public function popular()
    {
        return view('tickets.list');
    }

    public function open()
    {
        return view('tickets.list');
    }

    public function closed()
    {
        return view('tickets.list');
    }

    public function details(Ticket $ticket)
    {
        return view('tickets.details', compact('ticket'));
    }

}
