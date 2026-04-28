@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Tournament Info -->
        <div class="card mb-3">
            <div class="card-body">

                <!-- Top Row -->
                <div class="d-flex justify-content-between align-items-center mb-2">

                    <!-- Left Side -->
                    <h4 class="fw-bold mb-0">{{ $tournament->name }}</h4>

                    <!-- Right Side Buttons -->
                    <div class="d-flex gap-2">
                        <a href="{{ route('matches.index') }}" class="btn text-white btn-sm"
                            style="background-color:#0b0827;">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>

                        <a href="{{ route('matches.create') }}" class="btn text-white btn-sm"
                            style="background-color:#0b0827;">
                            <i class="fas fa-plus"></i> Add Match
                        </a>
                    </div>

                </div>
                <!-- Details -->
                <p class="mb-1"><strong>Type:</strong>
                    @if ($tournament->type == 'team')
                        Team
                    @else
                        Player
                    @endif
                </p>
                <p class="mb-1"><strong>Format:</strong> {{ $tournament->formate }}</p>
                <p class="mb-1"><strong>Entry Fee:</strong> ₹{{ $tournament->entry_fee }}</p>
                <p class="mb-0"><strong>Location:</strong> {{ $tournament->location }}</p>

            </div>
        </div>

        <!-- Players List -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                Registered Teams
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Player Role</th>
                            <th>Team Name</th>
                            <th>Email</th>
                            <th>Image</th>
                        
                            <th>Amount</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $key => $payment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($payment->player->role == 'team_captain')
                                        Team Captain
                                    @else
                                        Player
                                    @endif

                                </td>
                                <td>{{ $payment->player->team_name ?? '-' }}</td>
                                <td>{{ $payment->player->email ?? '-' }}</td>
                                <td>
                                    @if ($payment->player && $payment->player->profile_pic)
                                        <img src="{{ asset($payment->player->profile_pic) }}" alt="Player Image"
                                            width="50" height="50" style="border-radius:50%; object-fit:cover;">
                                    @else
                                        <img src="{{ asset('default-user.png') }}" alt="Default Image" width="50"
                                            height="50" style="border-radius:50%;">
                                    @endif
                                </td>
                            
                                <td>₹{{ $payment->amount }}</td>
                                <td>
                                    <a href="{{ route('player.info', $payment->player->id) }}" class="btn btn-sm"
                                        style="background-color:#0b0827; color:white;">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No players registered</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@include('back.includes.footer')
