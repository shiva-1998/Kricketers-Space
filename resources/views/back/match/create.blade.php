@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <h5 class="mb-0 fw-bold text-uppercase">Create Match</h5>
                <small class="text-muted">Add new match details</small>
            </div>
        </div>

        <!-- Form Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <hr class="my-4">
                <h5 class="fw-bold">Match Setup</h5>

                <div class="row g-3">

                   
                    <div class="col-md-6">
                        <label class="form-label">Team A</label>
                        <select name="team_a_id" class="form-select">
                            <option value="">Select Team A</option>
                            <option value="team1" {{ old('team_a_id') == 'team1' ? 'selected' : '' }}>Chennai Super
                                Kings</option>
                            <option value="team2" {{ old('team_a_id') == 'team2' ? 'selected' : '' }}>Mumbai Indians
                            </option>
                            <option value="team3" {{ old('team_a_id') == 'team3' ? 'selected' : '' }}>Royal Challengers
                                Bangalore</option>
                            <option value="team4" {{ old('team_a_id') == 'team4' ? 'selected' : '' }}>Kolkata Knight
                                Riders</option>
                        </select>
                        @error('team_a_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Team B -->
                    <div class="col-md-6">
                        <label class="form-label">Team B</label>
                        <select name="team_b_id" class="form-select">
                            <option value="">Select Team B</option>
                            <option value="team1" {{ old('team_b_id') == 'team1' ? 'selected' : '' }}>Chennai Super
                                Kings</option>
                            <option value="team2" {{ old('team_b_id') == 'team2' ? 'selected' : '' }}>Mumbai Indians
                            </option>
                            <option value="team3" {{ old('team_b_id') == 'team3' ? 'selected' : '' }}>Royal Challengers
                                Bangalore</option>
                            <option value="team4" {{ old('team_b_id') == 'team4' ? 'selected' : '' }}>Kolkata Knight
                                Riders</option>
                        </select>
                        @error('team_b_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Ground -->
                    <div class="col-md-6">
                        <label class="form-label">Ground</label>
                        <select name="ground_id" class="form-select">
                            <option value="">Select Ground</option>
                            @foreach ($grounds as $ground)
                                <option value="{{ $ground->id }}"
                                    {{ old('ground_id') == $ground->id ? 'selected' : '' }}>
                                    {{ $ground->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('ground_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Match Date -->
                    <div class="col-md-6">
                        <label class="form-label">Match Date</label>
                        <input type="datetime-local" name="match_date" value="{{ old('match_date') }}"
                            class="form-control">
                        @error('match_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('rules', {
        height: 200,
        placeholder: 'Enter tournament rules here...',
    });
</script>
@include('back.includes.footer')
