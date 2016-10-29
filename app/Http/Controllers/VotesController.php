<?php

namespace TeachMe\Http\Controllers;

use TeachMe\Repositories\TicketRepository;
use TeachMe\Repositories\VoteRepository;

class VotesController extends Controller
{
    private $ticketRepository;
    private $votesRepository;

    public function __construct(
        TicketRepository $ticketRepository,
        VoteRepository $votesRepository
    )
    {
        $this->ticketRepository = $ticketRepository;
        $this->votesRepository = $votesRepository;
    }

    public function submit($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id);

        if ($this->votesRepository->vote(user(), $ticket)) {
            return back()->with('success', 'Voto agregado correctamente');
        } else {
            return back()->withErrors('Ocurrio un error, vuelve a intentarlo');
        }
    }

    public function destroy($id)
    {
        $ticket = $this->ticketRepository
                    ->findOrFail($id);

        if ($this->votesRepository->unvote(user(), $ticket)) {
            return back()->with('success', 'Voto quitado correctamente');
        } else {
            return back()->withErrors('Ocurrio un error, vuelve a intentarlo');
        }
    }
}
