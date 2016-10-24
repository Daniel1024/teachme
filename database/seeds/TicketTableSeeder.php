<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\User;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $tickets = factory(Ticket::class)->times(50)->make();

        foreach ($tickets as $ticket) {
            $user = $users->random();

            $user->tickets()->save($ticket);
        }
    }
}
