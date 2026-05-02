@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h5 class="mb-1 fw-bold text-uppercase">Create Ground</h5>
                <small class="text-muted">Fill in the details to add a new ground</small>
            </div>
        </div>

        <!-- Form -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('grounds.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <!-- Ground Name -->
                        <div class="col-md-6">
                            <label class="form-label">Ground Name</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Enter ground name (e.g. Rajiv Gandhi Stadium)" required>
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control"
                                placeholder="Street / Area / Landmark">
                        </div>

                        <!-- City -->
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter city">
                        </div>

                        <!-- State -->
                        <div class="col-md-4">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control" placeholder="Enter state">
                        </div>

                        <!-- Country -->
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" value="India"
                                placeholder="Country name">
                        </div>

                        <!-- Pincode -->
                        <div class="col-md-4">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-control" placeholder="Enter pincode">
                        </div>

                        <!-- Capacity -->
                        <div class="col-md-4">
                            <label class="form-label">Capacity</label>
                            <input type="number" name="capacity" class="form-control" placeholder="No. of spectators">
                        </div>

                        <!-- Boundary Size -->
                        <div class="col-md-4">
                            <label class="form-label">Boundary Size (meters)</label>
                            <input type="number" name="boundary_size" class="form-control" placeholder="e.g. 65">
                        </div>

                        <!-- Ground Type -->
                        <div class="col-md-6">
                            <label class="form-label">Ground Type</label>
                            <select name="ground_type" class="form-select">
                                <option value="">Select type</option>
                                <option value="outdoor">Outdoor</option>
                                <option value="indoor">Indoor</option>
                            </select>
                        </div>

                        <!-- Pitch Type -->
                        <div class="col-md-6">
                            <label class="form-label">Pitch Type</label>
                            <select name="pitch_type" class="form-select">
                                <option value="">Select pitch</option>
                                <option value="turf">Turf</option>
                                <option value="mat">Mat</option>
                                <option value="concrete">Concrete</option>
                            </select>
                        </div>

                        <!-- Match Types -->
                        <div class="col-md-6">
                            <label class="form-label d-block">Match Types Supported</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="match_type_supported[]"
                                    value="T20">
                                <label class="form-check-label">T20</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="match_type_supported[]"
                                    value="ODI">
                                <label class="form-check-label">ODI</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="match_type_supported[]"
                                    value="TEST">
                                <label class="form-check-label">Test</label>
                            </div>
                        </div>

                        <!-- Booking Price -->
                        <div class="col-md-6">
                            <label class="form-label">Booking Price</label>
                            <input type="number" step="0.01" name="booking_price" class="form-control"
                                placeholder="Enter price (₹)">
                        </div>

                        <!-- Facilities -->
                        <div class="col-md-12">
                            <label class="form-label d-block">Facilities</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="has_floodlights"
                                    value="1">
                                <label class="form-check-label">Floodlights</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="has_dressing_room"
                                    value="1" checked>
                                <label class="form-check-label">Dressing Room</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="has_parking" value="1">
                                <label class="form-check-label">Parking</label>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="available">Available</option>
                                <option value="booked">Booked</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control"
                                placeholder="Write about ground features, pitch condition, etc..."></textarea>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-4">
                            Save Ground
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@include('back.includes.footer')
