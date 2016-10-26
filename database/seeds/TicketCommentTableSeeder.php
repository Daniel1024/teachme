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
        
        factory(TicketComment::class)->times(250)->create();

    }
}
