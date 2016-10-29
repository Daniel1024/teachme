<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;
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

    public function submit($id, Request $request)
    {
        $ticket = $this->ticketRepository->findOrFail($id);

        $success = $this->votesRepository->vote(user(), $ticket);

        if ($request->ajax()) {
            return response()->json(compact('success'));
        } else {
            if ($success) {
                return back()->with('success', 'Voto agregado correctamente');
            } else {
                return back()->withErrors('Ocurrio un error, vuelve a intentarlo');
            }
        }
    }

    public function destroy($id, Request $request)
    {
        $ticket = $this->ticketRepository
                    ->findOrFail($id);

        $success = $this->votesRepository->unvote(user(), $ticket);

        if ($request->ajax()) {
            return response()->json(compact('success'));
        } else {
            if ($success) {
                return back()->with('success', 'Voto quitado correctamente');
            } else {
                return back()->withErrors('Ocurrio un error, vuelve a intentarlo');
            }
        }
    }
}
