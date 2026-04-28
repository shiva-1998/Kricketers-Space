<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class TeamController extends Controller
{
    public function index()
    {

         $players = Player::where('role', 'team_captain')
            ->latest()
            ->paginate(8);
        return view('back.team.index', compact('players'));
    }

    public function show($id)
    {
        $player = Player::findOrFail($id);

        // return $player;
        return view('back.team.show', compact('player'));
    }
}
