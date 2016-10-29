<?php

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\User;

class TicketRepository extends BaseRepository
{

    public function getModel()
    {
        return new Ticket();
    }

    protected function selectTicketsList($status = null, $order = 'DESC', $paginate = 20)
    {
        if (!$order == 'ASC') {
            $order = 'DESC';
        }

        $query = $this->newQuery()
            ->selectRaw(
                'tickets.*, ' .
                '( SELECT COUNT(*) FROM ticket_comments WHERE ticket_comments.ticket_id = tickets.id ) as num_comments, ' .
                '( SELECT COUNT(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id ) as num_votes'
            )->with('author')->orderBy('created_at', $order);

        if ( ! is_null($status)) {
            $query->where('status', $status);
        }

        if ($paginate > 0) {
            return $query->paginate($paginate);
        } else {
            return $query->get();
        }
    }

    public function paginateLates()
    {
        return $this->selectTicketsList();
    }

    public function paginateOpen()
    {
        return $this->selectTicketsList('open');
    }

    public function paginateClosed()
    {
        return $this->selectTicketsList('closed');
    }

    public function openNew(User $user, String $title)
    {
        return $user->tickets()->create([
            'title'     => $title,
            'status'    => 'open'
        ]);
    }

}