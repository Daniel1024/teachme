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
        dd('popular');
    }

    public function open()
    {
        dd('open');
    }

    public function closed()
    {
        dd('closed');
    }

    public function details(Ticket $ticket)
    {
        return view('tickets.details', compact('ticket'));
    }

}
