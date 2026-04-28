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
        <div class="user-profile bg rounded-4 d-flex align-items-center gap-3 dropdown">
            <img src="{{ asset('assets/frontend/img/avatar.svg') }}" alt="Captain" class="rounded-circle border border-info captain-avatar" width="40" id="userProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
            <span class="fw-bold text-white dropdown-toggle" id="userProfileDropdownText" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                Captain
            </span>
            <ul class="dropdown-menu dropdown-menu-end custom-modal-bg border-0 mt-2" aria-labelledby="userProfileDropdown">
                <li>
                    <a class="dropdown-item text-white" href="{{ route('set-new-password') }}">
                        <i class="bi bi-key me-2"></i> Change Password
                    </a>
                </li>
                <li>
                    <form action="{{ route('user.logout.submit') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item text-white">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
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




            <section class="profile-page py-5">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="profile-main-title">My Profile</h2>
                            <p class="profile-subtitle">Manage your account settings</p>
                        </div>
                        <button class="btn btn-edit-profile">Edit Profile</button>
                    </div>

                    <div class="profile-section-card bg2  rounded-4 p-4 mb-4">
                        <h5 class="section-header">Personal Information</h5>
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <small class="info-label">Full Name</small>
                                <p class="info-value">Meghan Y</p>
                            </div>
                            <div class="col-md-3">
                                <small class="info-label">Email</small>
                                <p class="info-value">meghan.y@example.com</p>
                            </div>
                            <div class="col-md-3">
                                <small class="info-label">Phone</small>
                                <p class="info-value">+91 98765 43210</p>
                            </div>
                            <div class="col-md-3 text-end">
                                <img src="{{ asset('assets/frontend/img/avatar.webp') }}" alt="Profile Avatar" class="profile-avatar">
                            </div>
                            <div class="col-md-12 mt-3">
                                <small class="info-label">Role</small>
                                <p class="info-value">Player & Team Captain</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section-card bg2  rounded-4 p-4 mb-4">
                        <h5 class="section-header">Cricket Profile</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <small class="info-label">Preferred Role</small>
                                <p class="info-value">All-rounder</p>
                            </div>
                            <div class="col-md-3">
                                <small class="info-label">Batting Style</small>
                                <p class="info-value">Right-handed</p>
                            </div>
                            <div class="col-md-3">
                                <small class="info-label">Bowling Style</small>
                                <p class="info-value">Right-arm Medium</p>
                            </div>
                            <div class="col-md-3">
                                <small class="info-label">Jersey Number</small>
                                <p class="info-value">7</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section-card bg2  rounded-4 p-4 mb-4">
                        <h5 class="section-header">Account Settings</h5>
                        <div class="settings-list">
                            <div class="setting-item d-flex justify-content-between align-items-center py-3 border-bottom-teal">
                                <div>
                                    <p class="info-value mb-0">Email Notifications</p>
                                    <small class="info-label">Receive updates on matches</small>
                                </div>
                                <span class="status-pill-enabled">Enabled</span>
                            </div>
                            <div class="setting-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <p class="info-value mb-0">Push Notifications</p>
                                    <small class="info-label">Live match updates</small>
                                </div>
                                <span class="status-pill-enabled">Enabled</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-delete-account">Delete Account</button>
                    </div>
                </div>
            </section>
        </main>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statusPills = document.querySelectorAll('.status-pill-enabled');

            statusPills.forEach(pill => {
                pill.addEventListener('click', function() {
                    if (this.textContent === 'Enabled') {
                        this.textContent = 'Disabled';
                        this.style.color = '#94a3b8';
                        this.style.background = 'rgba(148, 163, 184, 0.1)';
                    } else {
                        this.textContent = 'Enabled';
                        this.style.color = 'var(--accent-color)';
                        this.style.background = 'rgba(0, 255, 136, 0.1)';
                    }
                });
            });
        });
    </script>


    <!-- Bootstrap JS (required for modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>