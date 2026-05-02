@include('back.includes.header')

<style>
    .card {
        border-radius: 12px;
    }

    .badge {
        font-size: 13px;
        padding: 6px 10px;
    }

    table td {
        vertical-align: middle;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">

        <!-- Tournament Info -->
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="fw-bold mb-1">{{ $tournament->name }}</h3>
                        <small class="text-muted">Tournament Overview</small>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('matches.index') }}" class="btn btn-dark btn-sm">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>

                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMatchModal">
                            <i class="fas fa-plus"></i> Add Match
                        </button>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <small class="text-muted">Type</small>
                            <h6 class="mb-0">{{ ucfirst($tournament->type) }}</h6>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <small class="text-muted">Format</small>
                            <h6 class="mb-0">{{ strtoupper($tournament->formate) }}</h6>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <small class="text-muted">Entry Fee</small>
                            <h6 class="mb-0 text-success">₹{{ $tournament->entry_fee }}</h6>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <small class="text-muted">Location</small>
                            <h6 class="mb-0">{{ $tournament->location }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Matches List -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white">
                <i class="fas fa-list"></i> Matches List
            </div>

            <div class="card-body">

                <!-- Matches List -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-list"></i> Matches List</span>
                        <span class="badge bg-light text-dark">{{ $matches->count() }} Matches</span>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead style="background:#111827;color:#fff;">
                                    <tr>
                                        <th class="ps-4">#</th>
                                        <th>Match</th>
                                        <th>Teams</th>
                                        <th>Ground</th>
                                        <th>Date & Time</th>
                                        <th>Score</th>
                                        <th class="pe-4">Result</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($matches as $key => $match)
                                        @php
                                            $score = app(\App\Http\Controllers\Admin\MatchController::class)->getScore(
                                                $match->id,
                                            );
                                        @endphp

                                        <tr>
                                            <td class="ps-4 fw-semibold text-muted">
                                                {{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}
                                            </td>

                                            <td>
                                                <span class="badge bg-secondary px-3 py-2">
                                                    Match {{ $key + 1 }}
                                                </span>
                                            </td>

                                            <td>
                                                <a href="{{ route('matches.view', $match->id) }}"
                                                    class="text-decoration-none text-dark fw-semibold">
                                                    <span class="badge bg-primary px-3 py-2">
                                                        {{ $match->team_a_id ?? 'TBD' }}
                                                    </span>

                                                    <span class="mx-2 text-dark fw-bold">VS</span>

                                                    <span class="badge bg-success px-3 py-2">
                                                        {{ $match->team_b_id ?? 'TBD' }}
                                                    </span>
                                                </a>
                                            </td>

                                            <td>
                                                <div class="fw-semibold">
                                                    <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                                    {{ $match->ground->name ?? '-' }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="fw-semibold">
                                                    {{ \Carbon\Carbon::parse($match->match_date)->format('d M Y') }}
                                                </div>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($match->match_date)->format('h:i A') }}
                                                </small>
                                            </td>

                                            <td>
                                                <div class="fw-bold">
                                                    {{ $score['runs'] }}/{{ $score['wickets'] }}
                                                </div>
                                                <small class="text-muted">
                                                    {{ $score['overs'] }} overs
                                                </small>
                                            </td>

                                            <td class="pe-4">
                                                @if ($match->winner)
                                                    <span class="badge bg-success px-3 py-2">
                                                        {{ $match->winner }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning text-dark px-3 py-2">
                                                        Pending
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-5">
                                                <i class="fas fa-calendar-times fa-2x mb-2"></i>
                                                <div>No matches scheduled yet</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- Add Match Modal -->
<div class="modal fade" id="addMatchModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">🏏 Add New Match</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>


            <form action="{{ route('matches.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">

                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Team A -->
                        <div class="col-md-6">
                            <label class="form-label">Team A</label>
                            <select name="team_a_id" id="teamA" class="form-select">
                                <option value="">Select Team A</option>
                                @foreach ($availableTeams as $team)
                                    <option value="{{ $team }}">{{ $team }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Team B -->
                        <div class="col-md-6">
                            <label class="form-label">Team B</label>
                            <select name="team_b_id" id="teamB" class="form-select">
                                <option value="">Select Team B</option>
                                @foreach ($availableTeams as $team)
                                    <option value="{{ $team }}">{{ $team }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Ground -->
                        <div class="col-md-6">
                            <label class="form-label">Ground</label>
                            <select name="ground_id" class="form-select">
                                <option value="">Select Ground</option>
                                @foreach ($grounds as $ground)
                                    <option value="{{ $ground->id }}">{{ $ground->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Match Date -->
                        <div class="col-md-6">
                            <label class="form-label">Match Date</label>
                            <input type="datetime-local" name="match_date" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Save Match
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@foreach ($matches as $match)
    <div class="modal fade" id="ballModal{{ $match->id }}">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('matches.addBall', $match->id) }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5>Add Ball</h5>
                    </div>

                    <div class="modal-body">
                        <input type="number" name="runs" class="form-control mb-2" placeholder="Runs">

                        <select name="is_wicket" class="form-select mb-2">
                            <option value="0">No Wicket</option>
                            <option value="1">Wicket</option>
                        </select>

                        <select name="is_extra" class="form-select mb-2">
                            <option value="0">Normal</option>
                            <option value="1">Extra</option>
                        </select>

                        <input type="text" name="extra_type" class="form-control" placeholder="Wide / No Ball">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
@foreach ($matches as $match)
    <div class="modal fade" id="resultModal{{ $match->id }}">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('matches.updateResult', $match->id) }}">
                @csrf

                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5>Update Result</h5>
                    </div>

                    <div class="modal-body">
                        <select name="winner" class="form-select">
                            <option value="">Select Winner</option>
                            <option value="{{ $match->team_a_id }}">
                                {{ $match->teamA->team_name ?? '' }}
                            </option>
                            <option value="{{ $match->team_b_id }}">
                                {{ $match->teamB->team_name ?? '' }}
                            </option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Save Result</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('teamA').addEventListener('change', function() {
        let selectedTeamA = this.value;
        let teamB = document.getElementById('teamB');

        teamB.value = "";

        Array.from(teamB.options).forEach(option => {
            if (option.value === selectedTeamA) {
                option.style.display = 'none';
            } else {
                option.style.display = 'block';
            }
        });
    });
</script>

@include('back.includes.footer')
