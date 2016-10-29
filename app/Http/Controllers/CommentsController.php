<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;
use TeachMe\Repositories\CommentRepository;
use TeachMe\Repositories\TicketRepository;

class CommentsController extends Controller
{
    private $commentRepository;
    private $ticketRepository;

    public function __construct(
        TicketRepository $ticketRepository,
        CommentRepository $commentRepository
    )
    {
        $this->commentRepository = $commentRepository;
        $this->ticketRepository = $ticketRepository;
    }

    public function submit(Request $request, $id)
    {
        $this->validate($request, [
            'comment'   => 'required|max:250',
            'link'      => 'url'
        ]);

        $ticket = $this->ticketRepository->findOrFail($id);

        $this->commentRepository
            ->create(
                $ticket,
                auth()->user(),
                $request->get('comment'),
                $request->get('link')
            );



        return back()->with('success', 'Tu comentario fue guradado exitosamente');
    }
}
