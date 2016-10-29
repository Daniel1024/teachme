<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

use TeachMe\Entities\Ticket;
use TeachMe\Repositories\TicketRepository;

class TicketsController extends Controller
{

    /**
     * @var TicketRepository
     */
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function latest()
    {
        $tickets = $this->ticketRepository->paginateLates();

        return view('tickets.list', compact('tickets'));
    }

    public function popular()
    {
        return view('tickets.list');
    }

    public function open()
    {
        $tickets = $this->ticketRepository->paginateOpen();

        return view('tickets.list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = $this->ticketRepository->paginateClosed();

        return view('tickets.list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id, 'comments.user');
        //dd($ticket);
        return view('tickets.details', compact('ticket'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120'
        ]);

        $ticket = $this->ticketRepository
            ->openNew(auth()->user(), $request->title);

        return redirect()->route('tickets.details', $ticket->id)->with('success', 'Ticket creado correctamente');
    }

}
