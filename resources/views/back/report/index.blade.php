@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-0 text-uppercase fw-bold">Tournament Report</h5>
                    <small class="text-muted">View Tournament Registration Details</small>
                </div>

                <div>
                    <form method="GET" action="{{ route('reports.pdf') }}">
                        <input type="hidden" name="tournament_id" value="{{ request('tournament_id') }}">
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bx bx-file"></i> Download PDF
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Filter -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">

                <form method="GET" action="{{ route('reports.index') }}">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Tournament</label>
                            <select name="tournament_id" class="form-select">
                                <option value="">Select Tournament</option>
                                @foreach ($tournaments as $tournament)
                                    <option value="{{ $tournament->id }}"
                                        {{ request('tournament_id') == $tournament->id ? 'selected' : '' }}>
                                        {{ $tournament->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control"
                                value="{{ $selectedTournament->registration_start ?? '-' }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control"
                                value="{{ $selectedTournament->registration_end ?? '-' }}">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Filter</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

        <!-- Summary -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <h6 class="fw-bold">
                    Total Registered Teams:
                    <span class="text-primary">{{ $totalTeams }}</span>
                </h6>
            </div>
        </div>

        <!-- Table -->
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover text-center mb-0">

                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Team</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->player->team_name }}</td>
                                <td>{{ $payment->player->email }}</td>
                                <td>
                                    <span
                                        class="badge {{ $payment->status == 'success' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $payment->status }}
                                    </span>
                                </td>
                                <td>{{ $payment->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="card-body">
                {{ $payments->links() }}
            </div>

        </div>

    </div>
</div>

@include('back.includes.footer')
