<?php

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;

class TicketRepository
{

    protected function selectTicketsList($status = null, $order = 'DESC', $paginate = 20)
    {
        if (!$order == 'ASC') {
            $order = 'DESC';
        }

        $query = Ticket::selectRaw(
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

    public function findOrFail($id)
    {
        return Ticket::with('comments.user')->findOrFail($id);
    }

}