<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Player;
use App\Models\Payment;
use App\Models\Ground;
class MatchController extends Controller
{

    public function index()
    {

        $tornaments = Tournament::latest()->paginate(8);
        return view('back.match.index', compact('tornaments'));
    }

    public function show($id)
    {

        $tournament = Tournament::findOrFail($id);

        $payments = Payment::with('player')
            ->where('tournament_id', $id)
            ->where('status', 'success')
            ->get();

        return view('back.match.show', compact('tournament', 'payments'));
    }

    public function create()
    {
        // return "madhu";

        $grounds = Ground::all();
        return view('back.match.create',compact('grounds'));
    }
}
