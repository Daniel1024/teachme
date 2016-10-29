<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 29/10/2016
 * Time: 12:15 PM
 */

namespace TeachMe\Repositories;


use Illuminate\Database\Eloquent\Model;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketVote;
use TeachMe\Entities\User;

class VoteRepository extends BaseRepository
{

    /**
     * @return Model
     */
    public function getModel()
    {
        return new TicketVote();
    }


    public function vote(User $user, Ticket $ticket)
    {
        if ($user->hasVoted($ticket)) return false;

        $user->voted()->attach($ticket);
        return true;
    }

    public function unvote(User $user, Ticket $ticket)
    {
        if ( ! $user->hasVoted($ticket)) return false;

        $user->voted()->detach($ticket);
        return true;
    }
}