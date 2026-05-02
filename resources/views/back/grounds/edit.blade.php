@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">

                <!-- Left Content -->
                <div>
                    <h5 class="mb-1 fw-bold text-uppercase">Edit Ground</h5>
                    <small class="text-muted">Update ground details</small>
                </div>

                <!-- Back Button -->
                <div>
                    <a href="{{ route('grounds.index') }}" class="btn btn-secondary">
                        ← Back
                    </a>
                </div>

            </div>
        </div>

        <!-- Form -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('grounds.update', $ground->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <!-- Ground Name -->
                        <div class="col-md-6">
                            <label class="form-label">Ground Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $ground->name) }}">
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control"
                                value="{{ old('location', $ground->location) }}">
                        </div>

                        <!-- City -->
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control"
                                value="{{ old('city', $ground->city) }}">
                        </div>

                        <!-- State -->
                        <div class="col-md-4">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control"
                                value="{{ old('state', $ground->state) }}">
                        </div>

                        <!-- Country -->
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control"
                                value="{{ old('country', $ground->country) }}">
                        </div>

                        <!-- Pincode -->
                        <div class="col-md-4">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-control"
                                value="{{ old('pincode', $ground->pincode) }}">
                        </div>

                        <!-- Capacity -->
                        <div class="col-md-4">
                            <label class="form-label">Capacity</label>
                            <input type="number" name="capacity" class="form-control"
                                value="{{ old('capacity', $ground->capacity) }}">
                        </div>

                        <!-- Boundary Size -->
                        <div class="col-md-4">
                            <label class="form-label">Boundary Size</label>
                            <input type="number" name="boundary_size" class="form-control"
                                value="{{ old('boundary_size', $ground->boundary_size) }}">
                        </div>

                        <!-- Ground Type -->
                        <div class="col-md-6">
                            <label class="form-label">Ground Type</label>
                            <select name="ground_type" class="form-select">
                                <option value="outdoor"
                                    {{ old('ground_type', $ground->ground_type) == 'outdoor' ? 'selected' : '' }}>
                                    Outdoor</option>
                                <option value="indoor"
                                    {{ old('ground_type', $ground->ground_type) == 'indoor' ? 'selected' : '' }}>Indoor
                                </option>
                            </select>
                        </div>

                        <!-- Pitch Type -->
                        <div class="col-md-6">
                            <label class="form-label">Pitch Type</label>
                            <select name="pitch_type" class="form-select">
                                <option value="turf"
                                    {{ old('pitch_type', $ground->pitch_type) == 'turf' ? 'selected' : '' }}>Turf
                                </option>
                                <option value="mat"
                                    {{ old('pitch_type', $ground->pitch_type) == 'mat' ? 'selected' : '' }}>Mat
                                </option>
                                <option value="concrete"
                                    {{ old('pitch_type', $ground->pitch_type) == 'concrete' ? 'selected' : '' }}>
                                    Concrete</option>
                            </select>
                        </div>

                        <!-- Match Types -->
                        @php
                            $matchTypes = explode(',', $ground->match_type_supported);
                        @endphp

                        <div class="col-md-6">
                            <label class="form-label d-block">Match Types Supported</label>

                            @foreach (['T20', 'ODI', 'TEST'] as $type)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="match_type_supported[]"
                                        value="{{ $type }}"
                                        {{ in_array($type, old('match_type_supported', $matchTypes)) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $type }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Booking Price -->
                        <div class="col-md-6">
                            <label class="form-label">Booking Price</label>
                            <input type="number" step="0.01" name="booking_price" class="form-control"
                                value="{{ old('booking_price', $ground->booking_price) }}">
                        </div>

                        <!-- Facilities -->
                        <div class="col-md-12">
                            <label class="form-label d-block">Facilities</label>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="has_floodlights" value="1"
                                    {{ old('has_floodlights', $ground->has_floodlights) ? 'checked' : '' }}>
                                <label class="form-check-label">Floodlights</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="has_dressing_room" value="1"
                                    {{ old('has_dressing_room', $ground->has_dressing_room) ? 'checked' : '' }}>
                                <label class="form-check-label">Dressing Room</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="has_parking" value="1"
                                    {{ old('has_parking', $ground->has_parking) ? 'checked' : '' }}>
                                <label class="form-check-label">Parking</label>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                @foreach (['available', 'booked', 'maintenance', 'inactive'] as $status)
                                    <option value="{{ $status }}"
                                        {{ old('status', $ground->status) == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $ground->description) }}</textarea>
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-success px-4">
                            Update Ground
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@include('back.includes.footer')
