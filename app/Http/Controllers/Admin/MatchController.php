<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Player;
use App\Models\Payment;
use App\Models\{Ground, MatchBall, TeamPlayer};
use App\Models\TournamentMatch;

class MatchController extends Controller
{

    public function index()
    {

        $tornaments = Tournament::latest()->paginate(8);
        return view('back.match.index', compact('tornaments'));
    }
    public function create()
    {
        // return "madhu";


        return view('back.match.create', compact('grounds'));
    }

    public function show($id)
    {
        $tournament = Tournament::findOrFail($id);

        $payments = Payment::with('player')
            ->where('tournament_id', $id)
            ->where('status', 'success')
            ->get();


        $teams = $payments->pluck('player.team_name')->filter()->unique();

        $grounds = Ground::all();

        $matches = TournamentMatch::with(['teamA', 'teamB', 'ground'])
            ->where('tournament_id', $id)
            ->orderBy('match_number')
            ->get();

        $usedTeams = TournamentMatch::where('tournament_id', $id)
            ->pluck('team_a_id')
            ->merge(
                TournamentMatch::where('tournament_id', $id)->pluck('team_b_id')
            )
            ->filter()
            ->map(fn($team) => strtolower(trim($team)))
            ->toArray();
        //    return $usedTeams;
        $availableTeams = $teams->filter(function ($team) use ($usedTeams) {
            return !in_array(strtolower(trim($team)), $usedTeams);
        });


        // return $availableTeams;

        return view('back.match.show', compact(
            'tournament',
            'matches',
            'availableTeams',
            'grounds',
            'payments',
            'teams'
        ));
    }


   


    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'team_a_id' => 'required',
            'team_b_id' => 'required|different:team_a_id',
            'ground_id' => 'required|exists:grounds,id',
            'match_date' => 'required|date',
        ]);

        TournamentMatch::create([
            'tournament_id' => $request->tournament_id,
            'team_a_id' => $request->team_a_id,
            'team_b_id' => $request->team_b_id,
            'ground_id' => $request->ground_id,
            'match_date' => $request->match_date,
        ]);

        return back()->with('success', 'Match added successfully!');
    }


    public function view($id)
    {
        // return $id;
        $match = TournamentMatch::query()
            ->leftJoin('players as teamA', 'teamA.team_name', '=', 'matches.team_a_id')
            ->leftJoin('players as teamB', 'teamB.team_name', '=', 'matches.team_b_id')
            ->leftJoin('grounds', 'grounds.id', '=', 'matches.ground_id')
            ->where('matches.id', $id)
            ->select(
                'matches.*',
                'grounds.name as ground_name',
                // Team A
                'teamA.id as teamA_id',
                'teamA.team_name as teamA_name',
                'teamA.team_logo as teamA_logo',
                // Team B
                'teamB.id as teamB_id',
                'teamB.team_name as teamB_name',
                'teamB.team_logo as teamB_logo'
            )

            ->first();
        $teamAPlayers = TeamPlayer::where('player_id', $match->teamA_id)->get();
        $teamBPlayers = TeamPlayer::where('player_id', $match->teamB_id)->get();

        $balls = \App\Models\MatchBall::where('match_id', $id)->latest()->get();

        $score = [
            'runs' => $balls->sum('runs'),
            'wickets' => $balls->where('is_wicket', 1)->count(),
            'legal_balls' => $balls->where('is_extra', 0)->count(),
        ];

        $score['overs'] = floor($score['legal_balls'] / 6) . '.' . ($score['legal_balls'] % 6);

        $currentBatsmen = $balls->take(2);

        $recentBalls = $balls->take(12);
        // return $teamAPlayers;
        return view('back.match.view', compact(
            'match',
            'teamAPlayers',
            'teamBPlayers',
            'score',
            'currentBatsmen',
            'recentBalls'
        ));
    }


     public function generateMatches($tournamentId)
    {
        $teams = Payment::with('player')
            ->where('tournament_id', $tournamentId)
            ->where('status', 'success')
            ->get()
            ->pluck('player.id')
            ->shuffle()
            ->values();

        $round = 1;
        $matchNumber = 1;
        $currentRound = [];

        // Round 1
        for ($i = 0; $i < count($teams); $i += 2) {

            $match = TournamentMatch::create([
                'tournament_id' => $tournamentId,
                'team_a_id' => $teams[$i],
                'team_b_id' => $teams[$i + 1] ?? null,
                'round' => $round,
                'match_number' => $matchNumber++
            ]);

            $currentRound[] = $match;
        }

        // Next rounds (auto knockout)
        while (count($currentRound) > 1) {
            $round++;
            $nextRound = [];

            for ($i = 0; $i < count($currentRound); $i += 2) {

                $nextMatch = TournamentMatch::create([
                    'tournament_id' => $tournamentId,
                    'round' => $round,
                    'match_number' => $matchNumber++
                ]);

                $currentRound[$i]->update(['next_match_id' => $nextMatch->id]);

                if (isset($currentRound[$i + 1])) {
                    $currentRound[$i + 1]->update(['next_match_id' => $nextMatch->id]);
                }

                $nextRound[] = $nextMatch;
            }

            $currentRound = $nextRound;
        }
    }

    public function addBall(Request $request, $matchId)
    {
        $lastBall = MatchBall::where('match_id', $matchId)->latest()->first();

        $over = $lastBall ? $lastBall->over_number : 1;
        $ball = $lastBall ? $lastBall->ball_number + 1 : 1;

        if ($ball > 6) {
            $over++;
            $ball = 1;
        }

        MatchBall::create([
            'match_id' => $matchId,
            'over_number' => $over,
            'ball_number' => $ball,
            'runs' => $request->runs ?? 0,
            'is_wicket' => $request->is_wicket ?? 0,
            'is_extra' => $request->is_extra ?? 0,
            'extra_type' => $request->extra_type
        ]);

        return back();
    }


    public function getScore($matchId)
    {
        $balls = MatchBall::where('match_id', $matchId)->get();

        $runs = $balls->sum('runs');
        $wickets = $balls->where('is_wicket', 1)->count();

        $totalBalls = $balls->count();
        $overs = floor($totalBalls / 6) . '.' . ($totalBalls % 6);

        return compact('runs', 'wickets', 'overs');
    }

    public function updateResult(Request $request, $id)
    {
        $match = TournamentMatch::findOrFail($id);

        $match->winner = $request->winner;
        $match->save();

        // find next match
        if ($match->next_match_id) {
            $nextMatch = TournamentMatch::find($match->next_match_id);

            if (!$nextMatch->team_a_id) {
                $nextMatch->team_a_id = $match->winner;
            } else {
                $nextMatch->team_b_id = $match->winner;
            }

            $nextMatch->save();
        }
    }

    public function saveToss(Request $request, $id)
    {
        $match = TournamentMatch::findOrFail($id);

        $match->toss_winner = $request->toss_winner;
        $match->toss_decision = $request->toss_decision;
        $match->opener_one = $request->opener_one;
        $match->opener_two = $request->opener_two;
        $match->save();

        return back()->with('success', 'Toss saved successfully');
    }

}
