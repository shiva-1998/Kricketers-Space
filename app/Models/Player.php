<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Player extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'role',
        'email',
        'email_verified_at',
        'otp',
        'password',
        'your_role',
        'batting_style',
        'bowling_type',
        'profile_pic',
        'team_name',
        'team_logo',
        'name',
        'phone'
    ];

    protected $hidden = [
        'password',
        'otp',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teamPlayers()
    {
        return $this->hasMany(TeamPlayer::class, 'player_id', 'id');
    }
}
