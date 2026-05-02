@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
       
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">

                <!-- Left Content -->
                <div>
                    <h5 class="mb-1 fw-bold text-uppercase">Create Tournament</h5>
                    <small class="text-muted">Add new tournament details</small>
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

                <form action="{{ route('tournaments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <!-- Type -->
                        <div class="col-md-4">
                            <label class="form-label">Tournament Type</label>
                            <select name="type" class="form-select">
                                <option value="">Select Tournament Type</option>
                                <option value="team" {{ old('type') == 'team' ? 'selected' : '' }}>Team</option>
                                <option value="player" {{ old('type') == 'player' ? 'selected' : '' }}>Player</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Name -->
                        <div class="col-md-8">
                            <label class="form-label">Tournament Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                placeholder="Enter tournament name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Slots -->
                        <div class="col-md-4">
                            <label class="form-label">Total Slots</label>
                            <input type="number" name="slots" value="{{ old('slots') }}" class="form-control"
                                placeholder="Enter total slots (e.g. 16)">
                            @error('slots')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Entry Fee -->
                        <div class="col-md-4">
                            <label class="form-label">Entry Fee (₹)</label>
                            <input type="number" name="entry_fee" value="{{ old('entry_fee') }}" class="form-control"
                                placeholder="Enter entry fee amount">
                            @error('entry_fee')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-4">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}"
                                class="form-control">
                            @error('start_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" value="{{ old('location') }}" class="form-control"
                                placeholder="Enter tournament location">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Format -->
                        <div class="col-md-6">
                            <label class="form-label">Format</label>
                            <select name="formate" class="form-select">
                                <option value="">Select Format</option>
                                <option value="t20">T20</option>
                                <option value="t10">T10</option>
                                <option value="odi">ODI</option>
                                <option value="test">Test</option>
                            </select>
                            @error('formate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Registration Start -->
                        <div class="col-md-6">
                            <label class="form-label">Registration Start</label>
                            <input type="date" name="registration_start" value="{{ old('registration_start') }}"
                                class="form-control">
                            @error('registration_start')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Registration End -->
                        <div class="col-md-6">
                            <label class="form-label">Registration End</label>
                            <input type="date" name="registration_end" value="{{ old('registration_end') }}"
                                class="form-control">
                            @error('registration_end')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Logo -->
                        <div class="col-md-6">
                            <label class="form-label">Tournament Logo</label>
                            <input type="file" name="logo" class="form-control">
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Rules -->
                        <div class="col-md-12">
                            <label class="form-label">Tournament Rules</label>
                            <textarea name="rules" id="rules" class="form-control" placeholder="Enter tournament rules...">{{ old('rules') }}</textarea>
                            @error('rules')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Tournament</button>
                    </div>
                </form>

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
