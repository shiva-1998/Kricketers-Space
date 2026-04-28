<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $tournaments = Tournament::all();

        $selectedTournament = null;
        $totalTeams = 0;

        $payments = Payment::with(['player', 'tournament'])
            ->when($request->tournament_id, function ($q) use ($request) {
                $q->where('tournament_id', $request->tournament_id);
            })
            ->latest()
            ->paginate(10);

        if ($request->tournament_id) {
            $selectedTournament = Tournament::find($request->tournament_id);
            $totalTeams = Payment::where('tournament_id', $request->tournament_id)
                ->where('status', 'success')
                ->count();
        }

        return view('back.report.index', compact(
            'tournaments',
            'payments',
            'selectedTournament',
            'totalTeams'
        ));
    }

   public function downloadPdf(Request $request)
    {
        $tournament = Tournament::find($request->tournament_id);

        if (!$tournament) {
            return back()->with('error', 'Tournament not found');
        }

        $payments = Payment::with('player')
            ->where('tournament_id', $tournament->id)
            ->whereBetween('created_at', [
                $tournament->registration_start,
                $tournament->registration_end
            ])
            ->get();

        $totalTeams = $payments->count();

        $pdf = PDF::loadView('back.report.pdf', compact(
            'payments',
            'tournament',
            'totalTeams'
        ));

        return $pdf->download('tournament_report.pdf');
    }
}
