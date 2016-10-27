<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;
use TeachMe\Entities\Ticket;

class VotesController extends Controller
{
    public function submit($id)
    {
        $ticket = Ticket::findOrFail($id);
        if (auth()->user()->vote($ticket)) {
            return back()->with('sucess', 'Voto agregado correctamente');
        } else {
            return back()->withErrors('Ocurrio un error, vuelve a intentarlo');
        }
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        if (auth()->user()->unvote($ticket)) {
            return back()->with('sucess', 'Voto quitado correctamente');
        } else {
            return back()->withErrors('Ocurrio un error, vuelve a intentarlo');
        }
    }
}
