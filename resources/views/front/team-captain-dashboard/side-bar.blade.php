<aside class="sidebar p-3 d-none d-lg-block">

    <nav class="nav flex-column gap-2">

        <a href="{{ route('team-captain-dashboard') }}"
            class="nav-link {{ request()->routeIs('team-captain-dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill me-3"></i> Dashboard
        </a>

        <a href="{{ route('team-captain-matches') }}"
            class="nav-link {{ request()->routeIs('team-captain-matches') ? 'active' : '' }}">
            <i class="bi bi-trophy me-3"></i> Matches
        </a>

        <a href="{{ route('team-captain-tournaments') }}"
            class="nav-link {{ request()->routeIs('team-captain-tournaments') ? 'active' : '' }}">
            <i class="bi bi-cup me-3"></i> Tournaments
        </a>

        <a href="{{ route('team-captain-players') }}"
            class="nav-link {{ request()->routeIs('team-captain-players') ? 'active' : '' }}">
            <i class="bi bi-people me-3"></i> Players
        </a>

        <a href="#" class="nav-link {{ request()->routeIs('team-captain-grounds') ? 'active' : '' }}">
            <i class="bi bi-geo-alt me-3"></i> Grounds
        </a>

        <a href="{{ route('team-captain-profile') }}"
            class="nav-link {{ request()->routeIs('team-captain-profile') ? 'active' : '' }}">
            <i class="bi bi-person-circle me-3"></i> Profile
        </a>

    </nav>
</aside>
