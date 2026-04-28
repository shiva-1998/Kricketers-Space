

@include('front.includes.header-links')


   

<section class="container-fluid captain-dashboard-section">
    <header class="d-flex justify-content-between sticky-top align-items-center m3-4 p-3">
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
        <aside class="sidebar p-3 d-none d-lg-block sticky-top" style="top: 281px; z-index: 1019;">
            <!-- 
                Added 'sticky-top' class to make the sidebar sticky.
                The style 'top: 81px;' ensures it doesn't overlap with sticky header.
                Adjust this top value if your header height changes.
            -->
            <nav class="nav flex-column gap-2">
                <a href="#" class="nav-link active"><i class="bi bi-grid-fill me-3"></i> Dashboard</a>
                <a href="#" class="nav-link"><i class="bi bi-trophy me-3"></i> Matches</a>
                <a href="#" class="nav-link"><i class="bi bi-cup me-3"></i> Tournaments</a>
                <a href="#" class="nav-link"><i class="bi bi-people me-3"></i> Players</a>
                <a href="#" class="nav-link"><i class="bi bi-geo-alt me-3"></i> Grounds</a>
                <a href="#" class="nav-link "><i class="bi bi-person-circle me-3"></i> Profile</a>
            </nav>
        </aside>
   

        <main class="main-content bg rounded-4 flex-grow-1 p-4">
       
            <h2 class="dashboard-title">Tournaments</h2>
            <p class="text-secondary mb-4">Browse and register for tournaments</p>

        

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

         

            <section class="tournaments-cards-section  bg-black">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-lg-3 col-md-6">
                <div class="tr-card">
                    <div class="tr-image-wrapper">
                        <img src="{{ asset('assets/frontend/img/ground.webp') }}" alt="Spring Championship" class="tr-image">
                    </div>
                    <div class="tr-content p-4">
                        <h4 class="tr-title">Spring Championship</h4>
                        <p class="tr-date">24 Mar - 15 Apr 2025</p>
                        
                        <div class="tr-info d-flex justify-content-between mb-4">
                            <div>
                                <small class="text-secondary d-block">Prize Pool</small>
                                <span class="tr-value">₹50,000</span>
                            </div>
                            <div class="text-end">
                                <small class="text-secondary d-block">Teams</small>
                                <span class="tr-value">25</span>
                            </div>
                        </div>
                        
                        <button class="btn-tr-outline w-100">View Details</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="tr-card">
                    <div class="tr-image-wrapper">
                    <img src="{{ asset('assets/frontend/img/ground.webp') }}" alt="Spring Championship" class="tr-image">
                    </div>
                    <div class="tr-content p-4">
                        <h4 class="tr-title">Spring Championship</h4>
                        <p class="tr-date">24 Mar - 15 Apr 2025</p>
                        <div class="tr-info d-flex justify-content-between mb-4">
                            <div>
                                <small class="text-secondary d-block">Prize Pool</small>
                                <span class="tr-value">₹50,000</span>
                            </div>
                            <div class="text-end">
                                <small class="text-secondary d-block">Teams</small>
                                <span class="tr-value">25</span>
                            </div>
                        </div>
                        <button class="btn-tr-outline w-100">Registered</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="tr-card">
                    <div class="tr-image-wrapper">
                        <img src="{{ asset('assets/frontend/img/ground.webp') }}" alt="Spring Championship" class="tr-image">
                    </div>
                    <div class="tr-content p-4">
                        <h4 class="tr-title">Spring Championship</h4>
                        <p class="tr-date">24 Mar - 15 Apr 2025</p>
                        <div class="tr-info d-flex justify-content-between mb-4">
                            <div>
                                <small class="text-secondary d-block">Prize Pool</small>
                                <span class="tr-value">₹50,000</span>
                            </div>
                            <div class="text-end">
                                <small class="text-secondary d-block">Teams</small>
                                <span class="tr-value">25</span>
                            </div>
                        </div>
                        <button class="btn-tr-filled w-100">Coming Soon</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="tr-card">
                    <div class="tr-image-wrapper">
                        <img src="{{ asset('assets/frontend/img/ground.webp') }}" alt="Spring Championship" class="tr-image">
                    </div>
                    <div class="tr-content p-4">
                        <h4 class="tr-title">Spring Championship</h4>
                        <p class="tr-date">24 Mar - 15 Apr 2025</p>
                        <div class="tr-info d-flex justify-content-between mb-4">
                            <div>
                                <small class="text-secondary d-block">Prize Pool</small>
                                <span class="tr-value">₹50,000</span>
                            </div>
                            <div class="text-end">
                                <small class="text-secondary d-block">Teams</small>
                                <span class="tr-value">25</span>
                            </div>
                        </div>
                        <button class="btn-tr-filled w-100">Coming Soon</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </main>
    </div>

</body>
</html>