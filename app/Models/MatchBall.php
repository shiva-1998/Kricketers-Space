<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchBall extends Model
{
    protected $table = 'match_balls';

    protected $fillable = [
        'match_id',
        'player_id',
        'over_number',
        'ball_number',
        'runs',
        'is_wicket',
        'is_extra',
        'extra_type',
    ];

    protected $casts = [
        'is_wicket' => 'boolean',
        'is_extra'  => 'boolean',
        'runs'      => 'integer',
        'over_number' => 'integer',
        'ball_number' => 'integer',
    ];

    /**
     * Relationship: Ball belongs to a Match
     */
    public function match()
    {
        return $this->belongsTo(TournamentMatch::class, 'match_id');
    }
}
