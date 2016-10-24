<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;

class TicketCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = Ticket::all();

        $comments = factory(TicketComment::class)->times(250)->make();

        foreach ($comments as $comment) {
            $ticket = $tickets->random();

            $ticket->ticketVotes()->save($comment);
        }
    }
}
