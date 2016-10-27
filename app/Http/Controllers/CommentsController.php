<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;

class CommentsController extends Controller
{
    public function submit(Request $request, $id)
    {
        $this->validate($request, [
            'comment'   => 'required|max:250',
            'link'      => 'url'
        ]);

        $comment = new TicketComment($request->only(['comment', 'link']));
        $comment->user_id = Auth()->user()->id;

        $ticket = Ticket::findOrFail($id);
        $ticket->comments()->save($comment);

        return back()->with('success', 'Tu comentario fue guradado exitosamente');
    }
}
