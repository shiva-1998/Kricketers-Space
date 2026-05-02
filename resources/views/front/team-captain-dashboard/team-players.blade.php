@include('front.includes.header-links')

<!-- ============================================== -->
<!-- Add Player Modal -->


<div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal-bg">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title text-cyan fw-bold" id="addPlayerModalLabel">Add Player</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body py-4">
                <form id="addPlayerForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-secondary small">Team Name</label>
                        <input type="text" name="name" class="form-control custom-input" placeholder="Full Name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary small">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control custom-input"
                            placeholder="dd----yyyy">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary small">Role</label>
                        <select name="role" class="form-select custom-input">
                            <option value="all_rounder" selected>All Rounder</option>
                            <option value="batsman">Batsman</option>
                            <option value="bowler">Bowler</option>
                            <option value="wicket_keeper">Wicket Keeper</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary small">Phone</label>
                        <input type="tel" name="phone" class="form-control custom-input" placeholder="9874562102">
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary small">Email</label>
                        <input type="email" name="email" class="form-control custom-input"
                            placeholder="example@company.com">
                    </div>

                    <div class="upload-area mb-4">
                        <p class="text-secondary small mb-2">Upload team logo (optional)</p>
                        <div class="upload-box">
                            <input type="file" name="photo" id="playerPhoto" hidden>
                            <label for="playerPhoto" class="small">Choose Photo</label>
                        </div>
                    </div>

                    <div class="d-flex gap-3 pt-2">
                        <button type="button" class="btn btn-outline-custom flex-grow-1"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-cyan-pill flex-grow-1">Save Player</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ============================================== -->


<section class="container-fluid captain-dashboard-section">
    <header class="d-flex justify-content-between sticky-top align-items-center m3-4 p-3">
        <div class="logo  ps-3">
            <img src="{{ asset('assets/frontend/img/logo/logo.webp') }}" alt="Logo" height="40">
        </div>
        <div class="search-wrap bg rounded-5 p-2 d-flex align-items-center  w-25">
            <i class="bi bi-search search-icon text-light"></i>
            <input type="text" class="form-control search-input bg-transparent custom-search-input"
                placeholder="Search">
        </div>
        <div class="user-profile bg rounded-4 d-flex align-items-center gap-3">
            <img src="{{ asset('assets/frontend/img/avatar.svg') }}" alt="Captain"
                class="rounded-circle border border-info captain-avatar" width="40">
            <span class="fw-bold text-white">Captain</span>
        </div>
    </header>
    <div class="d-flex">
        @include('front.team-captain-dashboard.side-bar')


        <main class="main-content bg rounded-4 flex-grow-1 p-4">

            <h2 class="dashboard-title">Matches</h2>
            <p class="text-secondary mb-4">View live, upcoming, and completed matches</p>



            <div class="row g-3 mb-5 match-metrics">
                <div class="col-6 col-lg-3">
                    <div class="metric-card rounded-4 bg2 d-flex align-items-center justify-content-center">
                        <div class="metric-label">Upcoming</div>
                        <h3 class="metric-value">5</h3>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card rounded-4 bg2">
                        <div class="metric-label">Live</div>
                        <h3 class="metric-value">1</h3>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card rounded-4 bg2">
                        <div class="metric-label">Completed</div>
                        <h3 class="metric-value">24</h3>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card rounded-4 bg2">
                        <div class="metric-label">Win Rate</div>
                        <h3 class="metric-value">67%</h3>
                    </div>
                </div>
            </div>




            <div class="section-card rounded-4 mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="m-0">All Matches</h5>
                    <button class="btn btn-sm btn-outline-secondary rounded-pill d-flex align-items-center gap-2">
                        Filter <i class="bi bi-sliders2"></i>
                    </button>
                </div>

                <section class="players-dashboard-section py-5 bg-black">
                    <div class="container">

                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h2 class="dashboard-title">Team Players</h2>
                                <p class="dashboard-subtitle">View player statistics and rankings</p>
                            </div>
                            <button type="button" class="btn btn-cyan-pill px-4 py-2" data-bs-toggle="modal"
                                data-bs-target="#addPlayerModal">
                                Add Player
                            </button>
                        </div>

                        <div class="dashboard-card-wrap">
                            <div class="table-responsive">
                                <table class="table table-dark align-middle mb-0 players-table">
                                    <thead>
                                        <tr>
                                            <th class="ps-4">J. No</th>
                                            <th>Player Name</th>
                                            <th>Team Name</th>
                                            <th>Runs</th>
                                            <th>Wickets</th>
                                            <th>Role</th>
                                            <th class="text-end pe-4">Avg Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($players as $key => $player)
                                            <tr>
                                                <td class="ps-4 j-number">{{ $key + 1 }}</td>
                                                <td class="fw-bold">{{ $player->name }}</td>
                                                <td class="text-secondary">{{ $user->team_name }}</td>
                                                <td>652</td>
                                                <td>8</td>
                                                <td class="text-secondary"> {{ ucwords(str_replace('_', ' ', $player->role)) }}</td>
                                                <td class="text-end pe-4">
                                                    <span class="rating-pill">9.2/10</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    No players are added
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                            <div class="dashboard-footer d-flex justify-content-between align-items-center p-4">
                                <span class="text-secondary small">Showing 15 players</span>
                                <div class="pagination-controls">
                                    <span class="page-arrow"><i class="bi bi-chevron-left"></i></span>
                                    <span class="page-number">1</span>
                                    <span class="page-arrow active"><i class="bi bi-chevron-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>



        </main>
    </div>





    <!-- Bootstrap JS (required for modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('addPlayerForm');

            if (!form) return;

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                try {
                    let response = await fetch("{{ route('team-player.store') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')
                                .value,
                            'Accept': 'application/json' // 🔥 IMPORTANT
                        },
                        body: formData
                    });

                    // ✅ Handle validation errors (Laravel 422)
                    if (response.status === 422) {
                        let data = await response.json();
                        console.log("Validation Errors:", data.errors);

                        let errorMsg = "";
                        Object.values(data.errors).forEach(err => {
                            errorMsg += err[0] + "\n";
                        });

                        alert(errorMsg);
                        return;
                    }

                    // ❌ Handle server error (500)
                    if (!response.ok) {
                        let text = await response.text();
                        console.error("Server Error:", text);
                        alert("Server error! Check console.");
                        return;
                    }

                    // ✅ Success response
                    let data = await response.json();

                    if (data.status) {
                        alert(data.message);
                        form.reset();
                        location.reload();
                    } else {
                        alert("Something went wrong");
                    }

                } catch (error) {
                    console.error("Fetch Error:", error);
                    alert("Network error or server not responding");
                }
            });

        });
    </script>
    </body>



    </html>
