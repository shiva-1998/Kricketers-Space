<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Payment;
use App\Models\Player;

class TournamentController extends Controller
{
    public function index()
    {

        $tornaments = Tournament::latest()->paginate(8);
        return view('back.tournament.index', compact('tornaments'));
    }

    public function create()
    {

        return view('back.tournament.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'type' => 'required|in:team,player',
            'name' => 'required|string|max:255',
            'slots' => 'required|integer',
            'location' => 'required|string|max:255',
            'entry_fee' => 'required|numeric',
            'start_date' => 'required|date',
            'rules' => 'required|string',
            'logo' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'formate' => 'required|in:t20,odi,t10,test',
            'registration_start' => 'required|date|before_or_equal:registration_end',
            'registration_end' => 'required|date|before:start_date|after_or_equal:registration_start',
        ]);


        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads/logo'), $imageName);

        Tournament::create([
            'type' => $request->type,
            'name' => $request->name,
            'slots' => $request->slots,
            'location' => $request->location,
            'entry_fee' => $request->entry_fee,
            'start_date' => $request->start_date,
            'rules' => $request->rules,
            'formate' => $request->formate,
            'registration_start' => $request->registration_start,
            'registration_end' => $request->registration_end,
            'logo'    => 'uploads/logo/' . $imageName,
        ]);


        return redirect()->route('tournaments.index')->with('success', 'Tournament created successfully!');
    }

    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('back.tournament.edit', compact('tournament'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:team,player',
            'name' => 'required|string|max:255',
            'slots' => 'required|integer',
            'location' => 'required|string|max:255',
            'entry_fee' => 'required|numeric',
            'start_date' => 'required|date',
            'rules' => 'required|string',
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'formate' => 'required|in:t20,odi,test,league,knockout',
            'registration_start' => 'required|date|before_or_equal:registration_end',
            'registration_end' => 'required|date|before:start_date|after_or_equal:registration_start',
        ]);


        $tournament = Tournament::findOrFail($id);
        if ($request->hasFile('logo')) {
            if ($tournament->logo && file_exists(public_path($tournament->logo))) {
                unlink(public_path($tournament->logo));
            }
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/logo'), $imageName);
            $tournament->logo = 'uploads/logo/' . $imageName;
        }

        $tournament->update([
            'type' => $request->type,
            'name' => $request->name,
            'slots' => $request->slots,
            'location' => $request->location,
            'entry_fee' => $request->entry_fee,
            'start_date' => $request->start_date,
            'rules' => $request->rules,
            'formate' => $request->formate,
            'registration_start' => $request->registration_start,
            'registration_end' => $request->registration_end,
            // 'logo'    => 'uploads/logo/' . $imageName,
        ]);

        return redirect()->route('tournaments.index')->with('success', 'Tournament updated successfully!');
    }

    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        if ($tournament->logo && file_exists(public_path($tournament->logo))) {
            unlink(public_path($tournament->logo));
        }
        $tournament->delete();

        return redirect()->route('tournaments.index')->with('success', 'Tournament deleted successfully!');
    }

    public function show($id)
    {

        $tournament = Tournament::findOrFail($id);

        $payments = Payment::with('player')
            ->where('tournament_id', $id)
            ->where('status', 'success') // optional (only paid users)
            ->get();
        // return $tournament;
        return view('back.tournament.show', compact('tournament', 'payments'));
    }

    public function playerInfo($id)
    {
        $player = Player::findOrFail($id);

        return view('back.tournament.player_info', compact('player'));
    }
}
