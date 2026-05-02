@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">

                <!-- Left Content -->
                <div>
                    <h5 class="mb-1 fw-bold text-uppercase">Edit Tournament</h5>
                    <small class="text-muted">Edit new tournament details</small>
                </div>

                <!-- Back Button -->
                <div>
                    <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">
                        ← Back
                    </a>
                </div>

            </div>
        </div>

        <!-- Form Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('tournaments.update', $tournament->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <!-- Type -->
                        <div class="col-md-4">
                            <label class="form-label">Tournament Type</label>
                            <select name="type" class="form-select">
                                <option value="">Select Tournament Type</option>
                                <option value="team" {{ $tournament->type == 'team' ? 'selected' : '' }}>Team</option>
                                <option value="player" {{ $tournament->type == 'player' ? 'selected' : '' }}>Player
                                </option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="col-md-8">
                            <label class="form-label">Tournament Name</label>
                            <input type="text" name="name" value="{{ $tournament->name }}" class="form-control">
                        </div>

                        <!-- Slots -->
                        <div class="col-md-4">
                            <label class="form-label">Total Slots</label>
                            <input type="number" name="slots" value="{{ $tournament->slots }}" class="form-control">
                        </div>

                        <!-- Entry Fee -->
                        <div class="col-md-4">
                            <label class="form-label">Entry Fee</label>
                            <input type="number" name="entry_fee" value="{{ $tournament->entry_fee }}"
                                class="form-control">
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-4">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" value="{{ $tournament->start_date }}"
                                class="form-control">
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" value="{{ $tournament->location }}"
                                class="form-control">
                        </div>

                        <!-- Format -->
                        <div class="col-md-6">
                            <label class="form-label">Format</label>
                            <select name="formate" class="form-select">
                                <option value="t20" {{ $tournament->formate == 't20' ? 'selected' : '' }}>T20
                                </option>
                                <option value="t10" {{ $tournament->formate == 't10' ? 'selected' : '' }}>T10
                                </option>
                                <option value="odi" {{ $tournament->formate == 'odi' ? 'selected' : '' }}>ODI
                                </option>
                                <option value="test" {{ $tournament->formate == 'test' ? 'selected' : '' }}>Test
                                </option>
                            </select>
                        </div>

                        <!-- Registration -->
                        <div class="col-md-6">
                            <label class="form-label">Registration Start</label>
                            <input type="date" name="registration_start"
                                value="{{ $tournament->registration_start }}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Registration End</label>
                            <input type="date" name="registration_end" value="{{ $tournament->registration_end }}"
                                class="form-control">
                        </div>

                        <!-- Logo -->
                        <div class="col-md-6">
                            <label class="form-label">Tournament Logo</label>
                            <input type="file" name="logo" class="form-control">

                            @if ($tournament->logo)
                                <img src="{{ asset($tournament->logo) }}" width="80" class="mt-2">
                            @endif
                        </div>

                        <!-- Rules -->
                        <div class="col-md-12">
                            <label class="form-label">Tournament Rules</label>
                            <textarea name="rules" id="rules" class="form-control">{{ $tournament->rules }}</textarea>
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Tournament</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('rules', {
        height: 200
    });
</script>
@include('back.includes.footer')
