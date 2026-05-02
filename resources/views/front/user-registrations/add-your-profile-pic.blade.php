@include('front.includes.header-links')


<section class="registration-page vh-100 d-flex align-items-center">
    <div class="container-fluid h-100">
        <div class="row h-100">

            <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-between p-5 left-panel position-relative">
                <div class="brand-top">
                    <img src="{{ asset('assets/frontend/img/logo/logo.svg') }}" alt="CCL Logo" class="brand-logo mb-4">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <i class="bi bi-chevron-left text-info"></i>
                        <span class="text-info text-uppercase fw-bold small">Season 2026 Open</span>
                    </div>
                    <h1 class="registration-heading">
                        Join The Ultimate <br>
                        <span class="text-info">Corporate Cricket</span> <br>
                        League.
                    </h1>
                    <p class="text-light lead">Compete • Track • Win</p>
                </div>

            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center right-panel p-5">
                <div class="form-container w-100" style="max-width: 450px;">


                    <a href="#" class="text-secondary text-decoration-none small mb-4 d-inline-block">
                        <i class="bi bi-arrow-left me-1"></i> Back
                    </a>

                    <h2 class="reg_from_heading">Add Your Profile Pic</h2>
                    <p class="reg_from_subheading">A great photo helps your teammates recognize you on the field.</p>
                    <form action="{{ route('user-profile.pic') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="profile-upload-container mt-5">

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label class="form-label text-white">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Phone Number Field -->
                            <div class="mb-3">
                                <label class="form-label text-white">Phone Number</label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="Enter your phone number" value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="upload-dropzone p-4 d-flex align-items-center mb-5">
                                <div class="preview-box me-4">
                                    <img id="profilePreview"
                                        src="{{ asset('assets/frontend/img/player-placeholder.png') }}"
                                        alt="Profile Preview" class="img-fluid rounded-1">
                                </div>

                                <div class="upload-controls text-start">
                                    <p class="text-secondary small mb-3">
                                        Drag & drop your photo here <br> or click to browse
                                    </p>

                                    <label class="cta-secondary-notched mb-0" style="cursor: pointer;">
                                        Upload Photo
                                        <input type="file" id="profileInput" name="profile_pic" accept="image/*"
                                            style="display: none;">
                                    </label>

                                    @error('profile_pic')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="cta1 w-100 mb-4">Continue</button>

                            <div class="d-flex align-items-center justify-content-between progress-container">
                                <div class="custom-progress-bar flex-grow-1 me-3">
                                    <div class="progress-fill" style="width: 75%;"></div>
                                </div>
                                <span class="text-secondary small">3 <span class="text-muted">/ 4</span></span>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    document.getElementById('profileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('profilePreview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(file);
        } else {
            // fallback to default image
            preview.src = "{{ asset('assets/frontend/img/player-placeholder.png') }}";
        }
    });
</script>
