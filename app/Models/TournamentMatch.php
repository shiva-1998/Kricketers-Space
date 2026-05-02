<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{

    protected $table = 'matches';
    protected $fillable = [
        'tournament_id',
        'team_a_id',
        'team_b_id',
        'ground_id',
        'match_date',
        'round',
        'match_number',
        'winner',
        'next_match_id',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function ground()
    {
        return $this->belongsTo(Ground::class)->select('id', 'name');
    }

    public function winnerTeam()
    {
        return $this->belongsTo(Player::class, 'winner');
    }

    // ✅ Self relation for bracket linking
    public function nextMatch()
    {
        return $this->belongsTo(TournamentMatch::class, 'next_match_id');
    }

    public function teamA()
    {
        return $this->belongsTo(Player::class, 'team_a_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Player::class, 'team_b_id');
    }
}
