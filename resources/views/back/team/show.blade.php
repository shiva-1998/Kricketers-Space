@include('back.includes.header')



<div class="page-wrapper">
    <div class="page-content">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h5 class="fw-bold mb-4">Team Full Details</h5>

                <div class="row">

                    <div class="col-md-4 text-center">
                        <img src="{{ asset($player->profile_pic) }}" class="rounded mb-3" width="150">
                    </div>

                    <div class="col-md-8">

                        <table class="table table-bordered">
                            <tr>
                                <th>Email</th>
                                <td>{{ $player->email }}</td>
                            </tr>

                            <tr>
                                <th>Role</th>
                                <td>
                                    @if ($player->role == 'team_captain')
                                        Team Captain
                                    @else
                                        Player
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Your Role</th>
                                <td>
                                    @if ($player->your_role == 'bowler')
                                        Bowler
                                    @elseif($player->your_role == 'all_rounder')
                                        All Rounder
                                    @elseif($player->your_role == 'batsman')
                                        Batsman
                                    @elseif($player->your_role == 'wicketkeeper')
                                        Wicket Keeper
                                    @else
                                        {{ ucfirst($player->your_role) }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Batting Style</th>
                                <td>
                                    @if ($player->batting_style == 'right_hand')
                                        Right Hand
                                    @elseif($player->batting_style == 'left_hand')
                                        Left Hand
                                    @else
                                        {{ ucfirst($player->batting_style) }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Bowling Type</th>
                                <td>
                                    @if ($player->bowling_type == 'fast')
                                        Fast
                                    @elseif($player->bowling_type == 'medium')
                                        Medium
                                    @elseif($player->bowling_type == 'spin')
                                        Spin
                                    @elseif($player->bowling_type == 'leg_break')
                                        Leg Break
                                    @else
                                        {{ ucfirst($player->bowling_type) }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Team Name</th>
                                <td>{{ $player->team_name }}</td>
                            </tr>

                            <tr>
                                <th>Team Logo</th>
                                <td>
                                    <img src="{{ asset($player->team_logo) }}" width="80">
                                </td>
                            </tr>

                            <tr>
                                <th>Registered At</th>
                                <td>{{ $player->created_at }}</td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@include('back.includes.footer')
