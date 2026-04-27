<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{

    public function index()
    {
        $players = Player::where('role', 'player')
            ->latest()
            ->paginate(8);

        return view('back.players.index', compact('players'));
    }
    public function show($id)
    {
        $player = Player::findOrFail($id);

        // return $player;
        return view('back.players.show', compact('player'));
    }
}
