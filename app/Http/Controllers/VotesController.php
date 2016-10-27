<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function submit($id)
    {
        dd("Votando por el ticket: $id");
    }

    public function destroy($id)
    {
        dd("Quitando el voto al ticket: $id");
    }
}
