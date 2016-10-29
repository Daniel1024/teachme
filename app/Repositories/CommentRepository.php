<?php

namespace TeachMe\Repositories;


use Illuminate\Database\Eloquent\Model;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Entities\User;

class CommentRepository extends BaseRepository
{

    /**
     * @return Model
     */
    public function getModel()
    {
        return new TicketComment();
    }

    public function create(Ticket $ticket, User $user, String $comment, String $link = '')
    {
        $commentTicket = $this->getModel();
        $commentTicket->comment = $comment;
        $commentTicket->link = $link;
        $commentTicket->user_id = $user->id;
        $ticket->comments()->save($commentTicket);

    }
}