<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketVote;
use TeachMe\Entities\User;

class TicketVoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = Ticket::all();

        $votes = factory(TicketVote::class)->times(250)->make();

        foreach ($votes as $vote) {
            $ticket = $tickets->random();

            $ticket->ticketVotes()->save($vote);
        }
    }
}
