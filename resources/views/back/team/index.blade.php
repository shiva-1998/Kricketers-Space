@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">

                <!-- Left -->
                <div>
                    <h5 class="mb-0 text-uppercase fw-bold">Teams Information</h5>
                    <small class="text-muted">View Teams details</small>
                </div>

                <!-- Right -->
                <div class="d-flex align-items-center gap-2">

                    <input type="text" class="form-control form-control-sm" style="width: 200px;"
                        placeholder="🔍 Search...">

                    <button class="btn btn-outline-primary btn-sm">
                        <i class="bx bx-download"></i> CSV
                    </button>

                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bx bx-file"></i> PDF
                    </button>

                </div>

            </div>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow-sm">

            <!-- Top Controls -->
            <div class="card-body d-flex justify-content-between align-items-center">

                <h6 class="mb-0 fw-bold">Players List</h6>

                <div class="d-flex gap-2">

                    <input type="text" class="form-control form-control-sm" style="width: 220px;"
                        placeholder="🔍 Search tournament...">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="bg-light text-center">
                        <tr>
                            <th>S.No</th>
                            <th>Profile</th>
                            <th>Name (Email)</th>
                            <th>Role</th>
                            <th>Team</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($players as $key => $player)
                            <tr>
                                <td>{{ $players->firstItem() + $key }}</td>
                                <td>
                                    @if ($player->profile_pic)
                                        <img src="{{ asset($player->profile_pic) }}" width="40"
                                            class="rounded-circle">
                                    @else
                                        <img src="https://via.placeholder.com/40" class="rounded-circle">
                                    @endif
                                </td>

                                <td class="text-center">{{ $player->email }}</td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $player->role == 'team_captain' ? 'Team Captain' : 'Player' }}
                                    </span>
                                </td>

                                <td>{{ $player->team_name ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('teams.show', $player->id) }}"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="bx bx-show"></i>
                                    </a>

                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="card-body d-flex justify-content-between align-items-center">

                <div class="text-muted small">
                    Showing {{ $players->firstItem() }} to {{ $players->lastItem() }}
                    of {{ $players->total() }} entries
                </div>

                {{ $players->links() }}

            </div>

        </div>

    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Delete Tournament</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <i class="bx bx-trash text-danger" style="font-size: 40px;"></i>
                <p class="mt-3 mb-0">Are you sure you want to delete this tournament?</p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button" class="btn btn-danger btn-sm">
                    Yes, Delete
                </button>
            </div>

        </div>
    </div>
</div>

@include('back.includes.footer')
