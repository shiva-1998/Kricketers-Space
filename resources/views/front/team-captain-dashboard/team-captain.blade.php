@include('front.includes.header-links')
<section class="container-fluid captain-dashboard-section">
    <header class="d-flex justify-content-between align-items-center m3-4 p-3">
        <div class="logo  ps-3">
            <img src="{{ asset('assets/frontend/img/logo/logo.webp') }}" alt="Logo" height="40">
        </div>
        <div class="search-wrap bg rounded-5 p-2 d-flex align-items-center  w-25">
            <i class="bi bi-search search-icon text-light"></i>
            <input type="text" class="form-control search-input bg-transparent custom-search-input" placeholder="Search">


        </div>
        <div class="user-profile bg rounded-4 d-flex align-items-center gap-3">
            <img src="{{ asset('assets/frontend/img/avatar.svg') }}" alt="Captain" class="rounded-circle border border-info captain-avatar" width="40">
            <span class="fw-bold text-white">Captain</span>
        </div>
    </header>
    <div class="d-flex">
        @include('front.team-captain-dashboard.side-bar')
        <main class="main-content bg rounded-4 flex-grow-1 p-4">

            <h2 class="dashboard-title">Team Dashboard</h2>
            <p class="text-secondary mb-4">Manage your team and tournament registrations</p>

            <div class="row g-3 mb-5">
                <div class="col-md-3">
                    <div class="stat-card  rounded-4">
                        <div class="d-flex justify-content-between mb-2">
                            <i class="bi bi-people text-info"></i>
                            <span class="badge badge-green">Active Players</span>
                        </div>
                        <small class="text-secondary">Team Members</small>
                        <h3 class="mb-0 text-white">15</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card  rounded-4">
                        <div class="d-flex justify-content-between mb-2">
                            <i class="bi bi-cloud-sun text-info"></i>
                            <span class="badge badge-red">This Season</span>
                        </div>
                        <small class="text-secondary">Wins</small>
                        <h3 class="mb-0 text-white">8</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card  rounded-4">
                        <div class="d-flex justify-content-between mb-2">
                            <i class="bi bi-check-circle text-info"></i>
                            <span class="badge badge-blue">Registered</span>
                        </div>
                        <small class="text-secondary">Tournaments</small>
                        <h3 class="mb-0 text-white">3</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card  rounded-4">
                        <div class="d-flex justify-content-between mb-2">
                            <i class="bi bi-bar-chart text-info"></i>
                            <span class="badge badge-orange">Team Performance</span>
                        </div>
                        <small class="text-secondary">Win Rate</small>
                        <h3 class="mb-0 text-white">73%</h3>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-lg-6">
                    <div class="section-card  rounded-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="m-0">Team Members</h5>
                            <button class="btn btn-sm btn-cyan notched">Add Player</button>
                        </div>
                        <div class="member-list d-flex flex-column gap-3">
                            <div class="list-item  rounded-4 bg">
                                <div>
                                    <div class="fw-bold text-white">Meghan Y (Captain)</div>
                                    <small class="text-secondary">All-rounder</small>
                                </div>
                                <span class="badge badge-green">Active</span>
                            </div>
                            <div class="list-item  rounded-4 bg">
                                <div>
                                    <div class="fw-bold text-white">Alex Kumar</div>
                                    <small class="text-secondary">Batsman</small>
                                </div>
                                <span class="badge badge-green">Active</span>
                            </div>
                            <div class="list-item  rounded-4 bg">
                                <div>
                                    <div class="fw-bold text-white">Priya Singh</div>
                                    <small class="text-secondary">Bowler</small>
                                </div>
                                <span class="badge badge-green">Active</span>
                            </div>
                            <a href="#" class="text-center text-info small mt-2">+12 more members</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="section-card  rounded-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="m-0">Tournament Registrations</h5>
                            <button class="btn btn-sm btn-outline-info notched">Browse</button>
                        </div>
                        <div class="registration-list d-flex flex-column gap-3">
                            <div class="reg-item notched active-border rounded-4 bg">
                                <div>
                                    <div class="fw-bold text-white">Spring Championship</div>
                                    <small class="text-secondary">Entry Fee: ₹5000</small>
                                </div>
                                <span class="badge badge-green">Active</span>
                            </div>
                            <div class="reg-item notched border-warning rounded-4 bg">
                                <div>
                                    <div class="fw-bold text-white">Monsoon Series</div>
                                    <small class="text-secondary">Entry Fee: ₹7500</small>
                                </div>
                                <span class="badge badge-orange">Pending Payment</span>
                            </div>
                            <div class="reg-item notched rounded-4 bg">
                                <div>
                                    <div class="fw-bold text-white">Elite Four Challenge</div>
                                    <small class="text-secondary">Entry Fee: ₹10000</small>
                                </div>
                                <span class="badge badge-blue">Registered</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-card rounded-4 mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="m-0">Upcoming Team Matches</h5>
                    <button class="btn btn-sm btn-outline-secondary rounded-pill">Full Schedule</button>
                </div>
                <div class="table-responsive rounded-4">
                    <table class="table table-dark table-hover align-middle rounded-4 custom-table">
                        <thead>
                            <tr>
                                <th>Tournament</th>
                                <th>Opponent</th>
                                <th>Date & Time</th>
                                <th>Ground</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('assets/frontend/img/avatar.svg') }}" width="24" class="me-2"> Spring Championship</td>
                                <td>FinanceHub</td>
                                <td>23 Apr, 10:00 AM</td>
                                <td>Central Ground</td>
                                <td><span class="badge badge-green">Active</span></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/frontend/img/avatar.svg') }}" width="24" class="me-2"> Spring Championship</td>
                                <td>BuildCo</td>
                                <td> Aug 12, 2024</td>
                                <td>East Field</td>
                                <td><span class="badge badge-green">Active</span></td>
                            </tr>

                            <tr>
                                <td><img src="{{ asset('assets/frontend/img/avatar.svg') }}" width="24" class="me-2"> Spring Championship</td>
                                <td>FinanceHub</td>
                                <td>Aug 12, 2024</td>
                                <td>West Stadium</td>
                                <td><span class="badge badge-green">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <section class="section-card rounded-4 mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="m-0">Upcoming Team Matches</h5>
                </div>

                <div class="chart-section rounded-4 d-flex align-items-center bg justify-content-center p-5">


                    <h4 class="text-info">[Chart: Win/Loss Ratio & Team Batting/Bowling Stats]</h4>
                </div>
            </section>


        </main>
    </div>

    </body>

    </html>