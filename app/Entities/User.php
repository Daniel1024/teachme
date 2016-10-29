<?php

namespace TeachMe\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function voted()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_votes')
            ->withTimestamps();
    }

    public function hasVoted(Ticket $ticket)
    {
        return $this->voted()->where('ticket_id', $ticket->id)
            ->count();
        /*
        return TicketVote::where(['user_id' => $this->id, 'ticket_id' => $ticket->id])
            ->count();
        */
    }

}
