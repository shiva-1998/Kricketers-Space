<style>
    /* Sidebar dropdown CSS */
    .sidebar-wrapper ul li {
        position: relative;
    }

    .sidebar-wrapper ul li ul {
        display: none;
        /* hide submenu */
        list-style: none;
        padding-left: 20px;
    }

    .sidebar-wrapper ul li:hover>ul {
        display: block;
        /* show submenu on hover */
    }

    .sidebar-wrapper ul li ul li {
        padding: 5px 0;
    }
</style>
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/sidebarlogo.jpeg') }}" class="logo-icon" alt="logo icon"
                style="width: 150px; margin-left: 36px;">
        </div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">

        {{-- Dashboard --}}
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Overview</div>
            </a>
        </li>

        {{-- Tournaments --}}
        <li>
            <a href="{{ route('tournaments.index') }}">
                <div class="parent-icon"><i class='bx bx-trophy'></i></div>
                <div class="menu-title">Tournaments</div>
            </a>
        </li>

        {{-- Teams --}}
        <li>
            <a href="{{ route('teams.index') }}">
                <div class="parent-icon"><i class='bx bx-group'></i></div>
                <div class="menu-title">Teams</div>
            </a>
        </li>

        {{-- Players --}}
        <li>
            <a href="{{ route('players.index') }}">
                <div class="parent-icon"><i class='bx bx-user'></i></div>
                <div class="menu-title">Players</div>
            </a>
        </li>

        {{-- Matches --}}
        <li>
            <a href="{{ route('matches.index') }}">
                <div class="parent-icon"><i class='bx bx-cricket-ball'></i></div>
                <div class="menu-title">Matches</div>
            </a>
        </li>

        {{-- Grounds --}}
        <li>
            <a href="{{ route('grounds.index') }}">
                <div class="parent-icon"><i class='bx bx-map'></i></div>
                <div class="menu-title">Grounds</div>
            </a>
        </li>

        {{-- Payments --}}
        <li>
            <a href="{{ route('payments.index') }}">
                <div class="parent-icon"><i class='bx bx-wallet'></i></div>
                <div class="menu-title">Payments</div>
            </a>
        </li>

        {{-- Reports --}}
        <li>
            <a href="{{ route('reports.index') }}">
                <div class="parent-icon"><i class='bx bx-bar-chart'></i></div>
                <div class="menu-title">Reports</div>
            </a>
        </li>

    </ul>
</div>
<script>
    $(document).ready(function() {
        $('#menu').metisMenu();
    });
</script>
