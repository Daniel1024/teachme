<?php

namespace TeachMe\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    public function ticketVotes()
    {
        return $this->hasMany(TicketVote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
