@include('front.includes.header-links')

@include('front.includes.header')

<main>

    <section class="home-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="home_banner_heading">The Home of <br>
                        <span>Corporate Cricket.</span>
                    </h1>
                    <p>Build your team, compete in tournaments, and experience the thrill of the
                        game — <br>all in one place</p>
                    <div class="ban_buttons d-flex align-items-center justify-content-center mt-4 gap-5">

                        <div class="btn1 ">

                            <a href="{{ route('sign-in') }}" class="cta1">Sign in</a>
                        </div>
                        <div class=" btn2">
                            <button class="cta2">View Matches</button>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <img src="{{ asset('assets/frontend/img/home/home-img.webp') }}" alt="" class="img-fluid">
                </div> -->
            </div>
        </div>

    </section>


    <section class="counters-section py-5 bg-black text-white overflow-hidden">
        <div class="container position-relative">

            <div class="bolt-decor left-bolt"></div>
            <div class="bolt-decor right-bolt"></div>

            <div class="row g-0 align-items-center">
                <div class="col-md-3 counter-item">
                    <p class="counter-label">Active Players</p>
                    <h2 class="counter-number">
                        <span data-purecounter-start="0" data-purecounter-end="8450" class="purecounter">0</span>+
                    </h2>
                </div>

                <div class="col-md-3 counter-item border-start-custom">
                    <p class="counter-label">Tournaments</p>
                    <h2 class="counter-number">
                        <span data-purecounter-start="0" data-purecounter-end="42" class="purecounter">0</span>+
                    </h2>
                </div>

                <div class="col-md-3 counter-item border-start-custom">
                    <p class="counter-label">Corporates</p>
                    <h2 class="counter-number">
                        <span data-purecounter-start="0" data-purecounter-end="80" class="purecounter">0</span>+
                    </h2>
                </div>

                <div class="col-md-3 counter-item border-start-custom">
                    <p class="counter-label">Matches Played</p>
                    <h2 class="counter-number">
                        <span data-purecounter-start="0" data-purecounter-end="18600" class="purecounter">0</span>+
                    </h2>
                </div>
            </div>
        </div>
    </section>



    <section class="live-scores-section py-5 bg-black">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <span class="sub-heading"><i class="bi bi-chevron-left"></i> Real-time</span>
                    <h2 class="main-heading">Live Scores</h2>
                </div>
                <button class="cta2">View All Matches</button>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="score-card live-border">
                        <div class="card-inner">
                            <div class="card-header-row d-flex justify-content-between">
                                <span class="status live text-danger"><i class="bi bi-chevron-left"></i> Live</span>
                                <span class="match-type">T20 | Q/F 2</span>
                            </div>

                            <div class="team-row mt-4 d-flex justify-content-between">
                                <span class="team-name">Google Gladiators</span>
                                <span class="score">89 <small>/ 2 (10.3)</small></span>
                            </div>
                            <div class="team-row mt-3 d-flex justify-content-between">
                                <span class="team-name">Amazon Avengers</span>
                                <span class="score">156 <small>/ 5 (20)</small></span>
                            </div>

                            <hr class="divider mt-4">
                            <p class="match-insight text-success">Google need 68 runs off 57 balls</p>
                            <p class="match-location"><i class="bi bi-geo-alt"></i> Chinnaswamy Stadium • IndiaTech Cup
                                S4</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="score-card completed-border">
                        <div class="card-inner">
                            <div class="card-header-row d-flex justify-content-between">
                                <span class="status completed text-success"><i class="bi bi-chevron-left"></i>
                                    Completed</span>
                                <span class="match-type">T20 • Group Stage</span>
                            </div>

                            <div class="team-row mt-4 d-flex justify-content-between">
                                <span class="team-name">Wipro Warriors</span>
                                <span class="score">187 <small>(20)</small></span>
                            </div>
                            <div class="team-row mt-3 d-flex justify-content-between">
                                <span class="team-name">TCS Tigers</span>
                                <span class="score">165 <small>(20)</small></span>
                            </div>

                            <hr class="divider mt-4">
                            <p class="match-insight text-warning">Wipro Warriors won by 22 runs</p>
                            <p class="match-location"><i class="bi bi-geo-alt"></i> DY Patil Stadium • Mumbai Corporate
                                League</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="score-card upcoming-border">
                        <div class="card-inner">
                            <div class="card-header-row d-flex justify-content-between">
                                <span class="status upcoming text-warning"><i class="bi bi-chevron-left"></i>
                                    Upcoming</span>
                                <span class="match-type">ODI • Semi-final</span>
                            </div>

                            <div class="team-row mt-4 d-flex justify-content-between">
                                <span class="team-name text-secondary">Wipro Warriors</span>
                                <span class="score">-</span>
                            </div>
                            <div class="team-row mt-3 d-flex justify-content-between">
                                <span class="team-name text-secondary">TCS Tigers</span>
                                <span class="score">-</span>
                            </div>

                            <hr class="divider mt-4">
                            <p class="match-insight text-white">Today • 3:00 PM IST</p>
                            <p class="match-location"><i class="bi bi-geo-alt"></i> BRSABV Ekana • BengaluruTech Open
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <section class="top-performers-section py-5 bg-black overflow-hidden">
        <div class="container position-relative">

            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <span class="sub-heading"><i class="bi bi-chevron-left"></i> Current Leaders - 2026</span>
                    <h2 class="main-heading ">Top Performers</h2>
                </div>
                <div class="d-flex gap-2">
                    <div class="swiper-prev custom-nav"><i class="bi bi-chevron-left"></i></div>
                    <div class="swiper-next custom-nav"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>

            <div class="swiper topPerformersSwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="performer-card d-flex flex-column flex-md-row align-items-center">
                            <div class="player-image-wrap">
                                <img src="{{ asset('assets/frontend/img/sanju.webp') }}" alt="Sanju Samson"
                                    class="player-img">
                            </div>
                            <div class="player-stats-content ms-md-5 mt-4 mt-md-0">
                                <span class="highest-score-label sub-heading"><i class="bi bi-chevron-left"></i>
                                    Highest score</span>
                                <div class="d-flex align-items-start mt-2">
                                    <span class="rank-number">1</span>
                                    <div class="ms-3">
                                        <h3 class="player-name">Sanju <br> Samson</h3>
                                        <h2 class="stat-highlight f2 text-danger">115</h2>
                                    </div>
                                </div>
                                <div class="stats-mini-grid mt-4">
                                    <div class="row g-0 text-center border border-secondary">
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">M</small><span
                                                class="fw-bold">4</span>
                                        </div>
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">HS</small><span
                                                class="fw-bold">115*</span>
                                        </div>
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">4/6's</small><span
                                                class="fw-bold">17/5</span>
                                        </div>
                                        <div class="col-3 p-2">
                                            <small class="d-block text-secondary">50/100's</small><span
                                                class="fw-bold">0/1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="swiper-slide">
                        <div class="performer-card d-flex flex-column flex-md-row align-items-center">
                            <div class="player-image-wrap">
                                <img src="{{ asset('assets/frontend/img/player2.jpg') }}" alt="Sanju Samson"
                                    class="player-img">
                            </div>
                            <div class="player-stats-content ms-md-5 mt-4 mt-md-0">
                                <span class="highest-score-label sub-heading"><i class="bi bi-chevron-left"></i>
                                    Highest score</span>
                                <div class="d-flex align-items-start mt-2">
                                    <span class="rank-number">1</span>
                                    <div class="ms-3">
                                        <h3 class="player-name">Sanju <br> Samson</h3>
                                        <h2 class="stat-highlight f2 text-danger">115</h2>
                                    </div>
                                </div>
                                <div class="stats-mini-grid mt-4">
                                    <div class="row g-0 text-center border border-secondary">
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">M</small><span
                                                class="fw-bold">4</span>
                                        </div>
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">HS</small><span
                                                class="fw-bold">115*</span>
                                        </div>
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">4/6's</small><span
                                                class="fw-bold">17/5</span>
                                        </div>
                                        <div class="col-3 p-2">
                                            <small class="d-block text-secondary">50/100's</small><span
                                                class="fw-bold">0/1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="performer-card d-flex flex-column flex-md-row align-items-center">
                            <div class="player-image-wrap">
                                <img src="{{ asset('assets/frontend/img/player3.png') }}" alt="Sanju Samson"
                                    class="player-img">
                            </div>
                            <div class="player-stats-content ms-md-5 mt-4 mt-md-0">
                                <span class="highest-score-label sub-heading"><i class="bi bi-chevron-left"></i>
                                    Highest score</span>
                                <div class="d-flex align-items-start mt-2">
                                    <span class="rank-number">1</span>
                                    <div class="ms-3">
                                        <h3 class="player-name">Sanju <br> Samson</h3>
                                        <h2 class="stat-highlight f2 text-danger">115</h2>
                                    </div>
                                </div>
                                <div class="stats-mini-grid mt-4">
                                    <div class="row g-0 text-center border border-secondary">
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">M</small><span
                                                class="fw-bold">4</span>
                                        </div>
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">HS</small><span
                                                class="fw-bold">115*</span>
                                        </div>
                                        <div class="col-3 p-2 border-end border-secondary">
                                            <small class="d-block text-secondary">4/6's</small><span
                                                class="fw-bold">17/5</span>
                                        </div>
                                        <div class="col-3 p-2">
                                            <small class="d-block text-secondary">50/100's</small><span
                                                class="fw-bold">0/1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mt-5">
                <button class="cta1 px-5">Full Leaderboard</button>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <section class="tournaments-section py-5 bg-black">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div class="header-group">
                    <span class="sub-heading"><i class="bi bi-chevron-left"></i> Compete</span>
                    <h2 class="main-heading ">Tournaments</h2>
                </div>
                <button class="cta2">View All</button>
            </div>

            <div class="row g-4">

                @foreach ($tournaments as $tournament)
                    @php
                        $registeredCount = \App\Models\Payment::where('tournament_id', $tournament->id)
                            ->where('status', 'success')
                            ->count();
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="tournament-card">
                            <div class="card-inner">
                                <div class="d-flex justify-content-between mb-4">
                                    <img src="{{ asset($tournament->logo) }}" alt="League Logo" class="league-icon">
                                    <span class="status-badge open">Open</span>
                                </div>
                                <h4 class="tournament-name">{{ $tournament->name }}</h4>
                                <p class="location-text"><i class="bi bi-geo-alt"></i> {{ $tournament->location }}</p>

                                <div class="tournament-stats d-flex mt-4">
                                    <div class="stat-box"><span>₹{{ $tournament->entry_fee }}</span><small>Entry
                                            Fee</small></div>
                                    <div class="stat-box">
                                        <span>{{ strtoupper($tournament->formate) }}</span><small>Format</small>
                                    </div>
                                    <div class="stat-box border-0">
                                        <span>{{ $registeredCount }}/{{ $tournament->slots }}</span><small>Teams</small>
                                    </div>
                                </div>

                                @auth
                                    @php
                                        $alreadyJoined = \App\Models\Payment::where('player_id', auth()->id())
                                            ->where('tournament_id', $tournament->id)
                                            ->where('status', 'success')
                                            ->exists();
                                    @endphp

                                    @if ($alreadyJoined)
                                        <button class="btn btn-secondary w-100 mt-3" disabled>
                                            Already Registered
                                        </button>
                                    @else
                                        <a href="{{ route('tournament.pay', $tournament->id) }}" class="cta1 w-100 mt-3">
                                            Register Team
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('sign-in') }}" class="cta1 w-100 mt-3">
                                        Register Team
                                    </a>
                                @endauth

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="one-platform-section py-5 text-center position-relative">
        <div class="bolt bolt-left d-none d-lg-block"></div>
        <div class="bolt bolt-right d-none d-lg-block"></div>

        <div class="container py-5">
            <h2 class="main-heading  mb-5">One Platform. All Action.</h2>

            <div class="row g-4 justify-content-center">
                <div class="col-6 col-lg-3">
                    <a href="#" class="platform-link">
                        <div class="link-content">
                            <img src="{{ asset('assets/frontend/img/fixtures.svg') }}" alt="Fixtures & Results">
                            <span>Fixtures & Results</span>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3">
                    <a href="#" class="platform-link">
                        <div class="link-content">
                            <img src="{{ asset('assets/frontend/img/points.svg') }}" alt="Points Table"> <span>Points
                                Table</span>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3">
                    <a href="#" class="platform-link">
                        <div class="link-content">
                            <img src="{{ asset('assets/frontend/img/Performance.svg') }}" alt="Performance Stats">
                            <span>Performance Stats</span>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3">
                    <a href="#" class="platform-link">
                        <div class="link-content">
                            <img src="{{ asset('assets/frontend/img/teams.svg') }}" alt="Teams & Players">
                            <span>Teams & Players</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="grounds-section py-5 bg-black text-white">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class=" clr_green sub-heading">
                        <i class="bi bi-chevron-left small"></i> Book a Ground
                    </span>
                    <h2 class="main-heading">Grounds & Availability</h2>
                </div>
                <button class="btn-all-ground cta2">All Grounds</button>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="ground-card">
                        <img src="{{ asset('assets/frontend/img/dlff.webp') }}" class="card-img-top"
                            alt="DLF Ground">
                        <div class="card-body">
                            <span class="status-tag available"><i class="bi bi-chevron-left"></i> Available</span>
                            <h4 class="card-title mt-2">DLF Cricket Ground</h4>
                            <p class="location-text"><i class="bi bi-geo-alt-fill"></i> DLF Phase 3, Gurugram</p>

                            <p class="slot-label mt-3">Pick a time slot — Mar 25</p>
                            <div class="time-slots mb-4">
                                <span class="slot active">9 - 11 AM</span>
                                <span class="slot active">11 - 1 PM</span>
                                <span class="slot disabled">1 - 3 PM</span>
                                <span class="slot active">3 - 5 PM</span>
                            </div>
                            <button class="btn-confirm cta1 w-100">Confirm Booking</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="ground-card">
                        <img src="{{ asset('assets/frontend/img/ambedkar-stadium.webp') }}" class="card-img-top"
                            alt="Ambedkar Stadium">
                        <div class="card-body">
                            <span class="status-tag full"><i class="bi bi-chevron-left"></i> Mostly Full</span>
                            <h4 class="card-title mt-2">Ambedkar Stadium</h4>
                            <p class="location-text"><i class="bi bi-geo-alt-fill"></i> ITO, New Delhi</p>

                            <p class="slot-label mt-3">Pick a time slot — Mar 25</p>
                            <div class="time-slots mb-4">
                                <span class="slot disabled">1 - 3 PM</span>
                                <span class="slot disabled">1 - 3 PM</span>
                                <span class="slot disabled">1 - 3 PM</span>
                                <span class="slot active">3 - 5 PM</span>
                            </div>
                            <button class="btn-confirm cta1 w-100">Confirm Booking</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="ground-card">
                        <img src="{{ asset('assets/frontend/img/dlf-ground.webp') }}" class="card-img-top"
                            alt="DLF Ground">
                        <div class="card-body">
                            <span class="status-tag available"><i class="bi bi-chevron-left"></i> Available</span>
                            <h4 class="card-title mt-2">DLF Cricket Ground</h4>
                            <p class="location-text"><i class="bi bi-geo-alt-fill"></i> DLF Phase 3, Gurugram</p>

                            <p class="slot-label mt-3">Pick a time slot — Mar 25</p>
                            <div class="time-slots mb-4">
                                <span class="slot active">9 - 11 AM</span>
                                <span class="slot active">11 - 1 PM</span>
                                <span class="slot disabled">1 - 3 PM</span>
                                <span class="slot active">3 - 5 PM</span>
                            </div>
                            <button class="btn-confirm cta1 w-100">Confirm Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="teams-section py-5 bg-black text-white">
        <div class="container">

            <div class="d-flex justify-content-between align-items-end mb-5">
                <div class="header-container">
                    <span class="sub-heading"><i class="bi bi-chevron-left"></i> Squads</span>
                    <h2 class="main-heading">All Teams</h2>
                </div>
                <button class="cta2">All teams</button>
            </div>

            <div class="row g-4">

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="card-inner">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <img src="{{ asset('assets/frontend/img/chennai.svg') }}" alt="TCS"
                                    class="team-logo">
                                <div class="stats-badge">
                                    <span class="win text-success">W 8</span> — <span class="loss text-danger">L
                                        2</span>
                                </div>
                            </div>
                            <h4 class="team-name">TCS Titans</h4>
                            <p class="company-text">Tata Consultancy Services</p>

                            <div class="captain-box mt-4 pt-3 border-top border-secondary">
                                <label class="text-secondary small">Captain</label>
                                <h5 class="captain-name">Rohit Sharma</h5>
                                <p class="text-secondary small">14 registered players</p>
                            </div>
                            <button class="btn-squad-action w-100 mt-2">View Squad</button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="card-inner">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <img src="{{ asset('assets/frontend/img/rcb.svg') }}" alt="Infosys"
                                    class="team-logo">
                                <div class="stats-badge">
                                    <span class="win text-success">W 7</span> — <span class="loss text-danger">L
                                        3</span>
                                </div>
                            </div>
                            <h4 class="team-name">Infosys Eagles</h4>
                            <p class="company-text">Infosys Technologies</p>

                            <div class="captain-box mt-4 pt-3 border-top border-secondary">
                                <label class="text-secondary small">Captain</label>
                                <h5 class="captain-name">Ajay Kumar</h5>
                                <p class="text-secondary small">13 registered players</p>
                            </div>
                            <button class="btn-squad-action w-100 mt-2">View Squad</button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="card-inner">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <img src="{{ asset('assets/frontend/img/mi.svg') }}" alt="Wipro"
                                    class="team-logo">
                                <div class="stats-badge">
                                    <span class="win text-success">W 6</span> — <span class="loss text-danger">L
                                        4</span>
                                </div>
                            </div>
                            <h4 class="team-name">Wipro Waves</h4>
                            <p class="company-text">Wipro Limited</p>

                            <div class="captain-box mt-4 pt-3 border-top border-secondary">
                                <label class="text-secondary small">Captain</label>
                                <h5 class="captain-name">Suresh Menon</h5>
                                <p class="text-secondary small">15 registered players</p>
                            </div>
                            <button class="btn-squad-action w-100 mt-2">View Squad</button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="card-inner">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <img src="{{ asset('assets/frontend/img/srh.svg') }}" alt="Google"
                                    class="team-logo">
                                <div class="stats-badge">
                                    <span class="win text-success">W 9</span> — <span class="loss text-danger">L
                                        2</span>
                                </div>
                            </div>
                            <h4 class="team-name">Google Knights</h4>
                            <p class="company-text">Google India Pvt. Ltd.</p>

                            <div class="captain-box mt-4 pt-3 border-top border-secondary">
                                <label class="text-secondary small">Captain</label>
                                <h5 class="captain-name">Vikram Menon</h5>
                                <p class="text-secondary small">14 registered players</p>
                            </div>
                            <button class="btn-squad-action w-100 mt-2">View Squad</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="gallery-section py-5 bg-black text-white">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div class="header-container">
                    <span class="sub-heading">
                        <i class="bi bi-chevron-left"></i> Highlights
                    </span>
                    <h2 class="main-heading ">Match Gallery</h2>
                </div>
                <button class="cta2">All photos</button>
            </div>

            <div class="masonry-grid">
                <div class="grid-item item-1">
                    <img src="{{ asset('assets/frontend/img/team-celebration.webp') }}" alt="Team Celebration">
                </div>
                <div class="grid-item item-2">
                    <img src="{{ asset('assets/frontend/img/team-walk.webp') }}" alt="Players walking onto field">
                </div>
                <div class="grid-item item-3">
                    <img src="{{ asset('assets/frontend/img/batting-action.webp') }}" alt="Batsman hitting a shot">
                </div>
                <div class="grid-item item-4">
                    <img src="{{ asset('assets/frontend/img/player-celebration.webp') }}"
                        alt="Virat Kohli celebration">
                </div>
                <div class="grid-item item-5">
                    <img src="{{ asset('assets/frontend/img/wicket-celebration.webp') }}" alt="Wicket celebration">
                </div>

                <div class="grid-item item-text d-flex align-items-end">
                    <div class="gallery-info p-3">
                        <p class="mb-3 lead">Relive the moments that defined the game. From powerful hits to
                            unforgettable finishes. Every match has a story — captured here.</p>
                        <p class="fw-bold">By - Corporate Cricket Platform</p>
                    </div>
                </div>
            </div>
        </div>
    </section>







    @include('front.includes.get-started')


</main>

@include('front.includes.footer')
