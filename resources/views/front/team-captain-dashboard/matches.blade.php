@include('front.includes.header-links')




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

                <div class="matches-table-wrap">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle matches-table">
                            <thead>
                                <tr>
                                    <th>Match</th>
                                    <th>Date & Time</th>
                                    <th>Result</th>
                                    <th>Your Performance</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold text-white">TechCorp vs FinanceHub</td>
                                    <td>23 Apr, 10:00 AM</td>
                                    <td><span class="result-pill won">Won</span></td>
                                    <td>42 runs, 2 wickets</td>
                                    <td class="text-end">
                                        <a href="#" class="action-eye" aria-label="View match">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-white">TechCorp vs CloudNet</td>
                                    <td>23 Apr, 10:00 AM</td>
                                    <td><span class="result-pill won">Won</span></td>
                                    <td>58 runs, 1 wicket</td>
                                    <td class="text-end">
                                        <a href="#" class="action-eye" aria-label="View match">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-white">TechCorp vs DataSys</td>
                                    <td>23 Apr, 10:00 AM</td>
                                    <td><span class="result-pill lost">Lost</span></td>
                                    <td>58 runs, 1 wicket</td>
                                    <td class="text-end">
                                        <a href="#" class="action-eye" aria-label="View match">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="matches-footer">
                        <div>Showing 1 to 3 of 3 Matches</div>
                        <div class="pager">
                            <span class="page-dot" aria-label="Previous"><i class="bi bi-chevron-left"></i></span>
                            <span class="page-current">1</span>
                            <span class="page-dot active" aria-label="Next"><i class="bi bi-chevron-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>



        </main>
    </div>

    </body>

    </html>
