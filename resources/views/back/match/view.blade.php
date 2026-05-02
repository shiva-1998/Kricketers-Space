@include('back.includes.header')

@php
    use App\Models\MatchBall;

    $balls = MatchBall::where('match_id', $match->id)->latest()->get();

    $runs = $balls->sum('runs');
    $wickets = $balls->where('is_wicket', 1)->count();
    $legalBalls = $balls->where('is_extra', 0)->count();
    $overs = floor($legalBalls / 6) . '.' . $legalBalls % 6;

    $recentBalls = $balls->take(12);

    $teamAName = $match->teamA_name ?? 'Team A';
    $teamBName = $match->teamB_name ?? 'Team B';
@endphp
@php
    $battingTeam = null;
    $bowlingTeam = null;

    if ($match->toss_winner && $match->toss_decision) {
        if ($match->toss_decision == 'batting') {
            $battingTeam = $match->toss_winner == 'A' ? 'A' : 'B';
            $bowlingTeam = $match->toss_winner == 'A' ? 'B' : 'A';
        } else {
            $battingTeam = $match->toss_winner == 'A' ? 'B' : 'A';
            $bowlingTeam = $match->toss_winner == 'A' ? 'A' : 'B';
        }
    }

    $openerOne = $teamAPlayers->merge($teamBPlayers)->firstWhere('id', $match->opener_one);
    $openerTwo = $teamAPlayers->merge($teamBPlayers)->firstWhere('id', $match->opener_two);

    $lastBowler = null;
    if ($balls->count()) {
        $lastBowler = $teamAPlayers->merge($teamBPlayers)->firstWhere('id', $balls->first()->bowler_id);
    }
@endphp
@php
    $currentStriker = $openerOne;
    $currentNonStriker = $openerTwo;

    if ($balls->count()) {
        $lastBall = $balls->first();

        // You can improve logic later (strike rotation etc.)
        $currentStriker = $teamAPlayers->merge($teamBPlayers)->firstWhere('id', $lastBall->player_id);
        $currentBowler = $teamAPlayers->merge($teamBPlayers)->firstWhere('id', $lastBall->bowler_id);
    } else {
        $currentBowler = $lastBowler;
    }

    // Example target (if 2nd innings logic later)
    $target = $match->target ?? null;
@endphp
<style>
    .match-header {
        background: linear-gradient(135deg, #0d1b2a, #1b263b);
        color: white;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 12px 25px rgba(0, 0, 0, .15);
    }

    .team-logo {
        width: 70px;
        height: 70px;
        object-fit: contain;
    }

    .nav-tabs .nav-link {
        border-radius: 20px;
        margin-right: 8px;
        font-weight: 600;
    }

    .card {
        border-radius: 16px;
        border: 0;
        box-shadow: 0 8px 18px rgba(0, 0, 0, .05);
    }

    .player-card {
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        margin-bottom: 15px;
    }

    .player-top {
        background: linear-gradient(135deg, #0d1b2a, #1b263b);
        color: white;
        padding: 12px;
    }

    .player-avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, .2);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
        margin-top: 12px;
    }

    .stat-box {
        background: #f8f9fa;
        border-radius: 10px;
        text-align: center;
        padding: 8px;
    }

    .stat-box h6 {
        margin: 0;
        font-weight: 700;
    }

    .ball-badge {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        background: #fff;
        color: #000;
        margin: 2px;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">

        <!-- HEADER -->
        <div class="match-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1 text-white">{{ $match->tournament->name ?? 'Tournament' }}</h4>
                    <small>
                        {{ $match->ground->name ?? '-' }} •
                        {{ \Carbon\Carbon::parse($match->match_date)->format('d M Y, h:i A') }}
                    </small>
                </div>
                @if (!$match->toss_winner)
                    <div class="mt-2">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#tossModal">
                            Toss
                        </button>
                    </div>
                @endif
                @if ($match->winner)
                    <span class="badge bg-success px-3 py-2">Winner: {{ $match->winner }}</span>
                @else
                    <span class="badge bg-danger px-3 py-2">LIVE</span>
                @endif
            </div>

            <div class="row align-items-center mt-4 text-center">

                <!-- TEAM A (Batting or Bowling) -->
                <div class="col-md-4">
                    <img src="{{ asset($match->teamA_logo) }}" class="team-logo mb-2">
                    <h5 class="text-white mb-1">{{ $teamAName }}</h5>

                    @if ($battingTeam == 'A')
                        <div style="font-size:13px;">
                            <div>
                                🏏 <strong>{{ $currentStriker->name ?? '-' }}</strong> *
                            </div>
                            <div>
                                {{ $currentNonStriker->name ?? '-' }}
                            </div>
                        </div>
                    @else
                        <div style="font-size:13px;">
                            🎯 Bowler: <strong>{{ $currentBowler->name ?? '-' }}</strong>
                        </div>
                    @endif
                </div>

                <!-- CENTER SCORE -->
                <div class="col-md-4">
                    <h1 class="text-warning fw-bold mb-0">{{ $runs }}/{{ $wickets }}</h1>
                    <div>{{ $overs }} Overs</div>

                    <!-- TARGET / CRR -->
                    <div class="mt-1" style="font-size:13px;">
                        @if ($target)
                            Target: {{ $target }}
                        @endif

                        @if ($legalBalls > 0)
                            | CRR: {{ number_format($runs / ($legalBalls / 6), 2) }}
                        @endif
                    </div>

                    <!-- RECENT BALLS -->
                    <div class="mt-2">
                        @foreach ($recentBalls as $ball)
                            <span class="ball-badge">
                                @if ($ball->is_wicket)
                                    W
                                @else
                                    {{ $ball->runs }}
                                @endif
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- TEAM B -->
                <div class="col-md-4">
                    <img src="{{ asset($match->teamB_logo) }}" class="team-logo mb-2">
                    <h5 class="text-white mb-1">{{ $teamBName }}</h5>

                    @if ($battingTeam == 'B')
                        <div style="font-size:13px;">
                            <div>
                                🏏 <strong>{{ $currentStriker->name ?? '-' }}</strong> *
                            </div>
                            <div>
                                {{ $currentNonStriker->name ?? '-' }}
                            </div>
                        </div>
                    @else
                        <div style="font-size:13px;">
                            🎯 Bowler: <strong>{{ $currentBowler->name ?? '-' }}</strong>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <!-- TOP BUTTON -->
        <div class="mb-3 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBallModal">
                + Add Ball
            </button>
        </div>

        <!-- TABS -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Overview</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#squads">Squads</button>
            </li>
        </ul>

        <div class="tab-content">

            <!-- OVERVIEW -->
            <div class="tab-pane fade show active" id="overview">
                <div class="card p-4">
                    <h5 class="mb-3">Match Info</h5>

                    <div class="row">
                        <div class="col-md-3">
                            <strong>Runs</strong>
                            <div>{{ $runs }}</div>
                        </div>

                        <div class="col-md-3">
                            <strong>Wickets</strong>
                            <div>{{ $wickets }}</div>
                        </div>

                        <div class="col-md-3">
                            <strong>Overs</strong>
                            <div>{{ $overs }}</div>
                        </div>

                        <div class="col-md-3">
                            <strong>Ground</strong>
                            <div>{{ $match->ground->name ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SQUADS -->
            <div class="tab-pane fade" id="squads">
                <div class="row">

                    <!-- TEAM A -->
                    <div class="col-md-6">
                        <h5 class="mb-3 text-primary">{{ $teamAName }}</h5>

                        @foreach ($teamAPlayers as $player)
                            @php $stats = $playerStats[$player->id] ?? null; @endphp

                            <div class="card mb-3 shadow-sm">
                                <div class="card-body d-flex align-items-center">

                                    <img src="{{ asset('uploads/team_players/' . ($player->photo ?? 'default-player.png')) }}"
                                        class="rounded-circle me-3" width="55" height="55">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">
                                            {{ $player->name }}

                                            @if ($currentStriker && $currentStriker->id == $player->id)
                                                <span class="badge bg-success ms-1">Striker</span>
                                            @endif

                                            @if ($currentBowler && $currentBowler->id == $player->id)
                                                <span class="badge bg-danger ms-1">Bowler</span>
                                            @endif
                                        </h6>

                                        <small class="text-muted">{{ ucfirst($player->role) }}</small>

                                        <div class="mt-2 d-flex gap-3 small">
                                            <span>R: <strong>{{ $stats->runs ?? 0 }}</strong></span>
                                            <span>B: <strong>{{ $stats->balls ?? 0 }}</strong></span>
                                            <span>4s: <strong>{{ $stats->fours ?? 0 }}</strong></span>
                                            <span>6s: <strong>{{ $stats->sixes ?? 0 }}</strong></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- TEAM B -->
                    <div class="col-md-6">
                        <h5 class="mb-3 text-success">{{ $teamBName }}</h5>

                        @foreach ($teamBPlayers as $player)
                            @php $stats = $playerStats[$player->id] ?? null; @endphp

                            <div class="card mb-3 shadow-sm">
                                <div class="card-body d-flex align-items-center">

                                    <img src="{{ asset('uploads/team_players/' . ($player->photo ?? 'default-player.png')) }}"
                                        class="rounded-circle me-3" width="55" height="55">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">
                                            {{ $player->name }}

                                            @if ($currentStriker && $currentStriker->id == $player->id)
                                                <span class="badge bg-success ms-1">Striker</span>
                                            @endif

                                            @if ($currentBowler && $currentBowler->id == $player->id)
                                                <span class="badge bg-danger ms-1">Bowler</span>
                                            @endif
                                        </h6>

                                        <small class="text-muted">{{ ucfirst($player->role) }}</small>

                                        <div class="mt-2 d-flex gap-3 small">
                                            <span>R: <strong>{{ $stats->runs ?? 0 }}</strong></span>
                                            <span>B: <strong>{{ $stats->balls ?? 0 }}</strong></span>
                                            <span>4s: <strong>{{ $stats->fours ?? 0 }}</strong></span>
                                            <span>6s: <strong>{{ $stats->sixes ?? 0 }}</strong></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<!-- ADD BALL MODAL -->
<div class="modal fade" id="addBallModal">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('matches.addBall', $match->id) }}">
            @csrf

            <div class="modal-content border-0" style="border-radius:18px;">
                <div class="modal-header bg-dark text-white">
                    <h5 class="mb-0 text-white">Add Ball</h5>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label>Batsman</label>
                            <select name="player_id" class="form-select">
                                @foreach ($teamAPlayers->merge($teamBPlayers) as $player)
                                    <option value="{{ $player->id }}">{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Bowler</label>
                            <select name="bowler_id" class="form-select">
                                @foreach ($teamAPlayers->merge($teamBPlayers) as $player)
                                    @if (in_array($player->role, ['bowler', 'all_rounder']))
                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Runs</label>
                            <input type="number" name="runs" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Wicket</label>
                            <select name="is_wicket" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Extra</label>
                            <select name="is_extra" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save Ball</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- TOSS MODAL -->
<div class="modal fade" id="tossModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('matches.saveToss', $match->id) }}">
            @csrf

            <div class="modal-content border-0" style="border-radius:18px;">
                <div class="modal-header bg-dark text-white">
                    <h5 class="mb-0 text-white">Match Toss</h5>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-12">
                            <label>Toss Winner</label>
                            <select name="toss_winner" id="toss_winner" class="form-select" required>
                                <option value="">Select</option>
                                <option value="A">{{ $teamAName }}</option>
                                <option value="B">{{ $teamBName }}</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Decision</label>
                            <select name="toss_decision" id="toss_decision" class="form-select" required>
                                <option value="">Select</option>
                                <option value="batting">Batting</option>
                                <option value="bowling">Bowling</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Opener 1</label>
                            <select name="opener_one" id="opener_one" class="form-select" required></select>
                        </div>

                        <div class="col-md-12">
                            <label>Opener 2</label>
                            <select name="opener_two" id="opener_two" class="form-select" required></select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save Toss</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const teamAPlayers = @json($teamAPlayers->values());
    const teamBPlayers = @json($teamBPlayers->values());

    function getBattingTeam() {
        const tossWinner = document.getElementById('toss_winner').value;
        const decision = document.getElementById('toss_decision').value;

        if (!tossWinner || !decision) return [];

        if (decision === 'batting') {
            return tossWinner === 'A' ? teamAPlayers : teamBPlayers;
        } else {
            return tossWinner === 'A' ? teamBPlayers : teamAPlayers;
        }
    }

    function getBowlingTeam() {
        const tossWinner = document.getElementById('toss_winner').value;
        const decision = document.getElementById('toss_decision').value;

        if (!tossWinner || !decision) return [];

        if (decision === 'batting') {
            return tossWinner === 'A' ? teamBPlayers : teamAPlayers;
        } else {
            return tossWinner === 'A' ? teamAPlayers : teamBPlayers;
        }
    }

    function fillOpeners() {
        const players = getBattingTeam();

        const opener1 = document.getElementById('opener_one');
        const opener2 = document.getElementById('opener_two');

        opener1.innerHTML = '';
        opener2.innerHTML = '';

        players.forEach(player => {
            opener1.innerHTML += `<option value="${player.id}">${player.name}</option>`;
            opener2.innerHTML += `<option value="${player.id}">${player.name}</option>`;
        });
    }

    function fillAddBallDropdowns() {
        const battingPlayers = getBattingTeam();
        const bowlingPlayers = getBowlingTeam();

        const batsman = document.getElementById('batsman_select');
        const bowler = document.getElementById('bowler_select');

        batsman.innerHTML = '';
        bowler.innerHTML = '';

        battingPlayers.forEach(player => {
            batsman.innerHTML += `<option value="${player.id}">${player.name}</option>`;
        });

        bowlingPlayers.forEach(player => {
            if (
                player.role && ['Bowler', 'All Rounder', 'bowler', 'all_rounder'].includes(player.role)
            ) {
                bowler.innerHTML += `<option value="${player.id}">${player.name}</option>`;
            }
        });
    }

    document.getElementById('toss_winner').addEventListener('change', function() {
        fillOpeners();
        fillAddBallDropdowns();
    });

    document.getElementById('toss_decision').addEventListener('change', function() {
        fillOpeners();
        fillAddBallDropdowns();
    });
</script>

@include('back.includes.footer')
