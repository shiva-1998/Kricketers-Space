<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    protected $table = 'team_players';

    protected $fillable = [
        'player_id',
        'name',
        'date_of_birth',
        'role',
        'phone',
        'email',
        'photo'
    ];
}
