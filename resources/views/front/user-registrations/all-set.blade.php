@include('front.includes.header-links')



<section class="registration-page vh-100 d-flex align-items-center">
    <!-- <section class="signup-section py-5 d-flex align-items-center"> -->
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
                        <i class="fa fa-arrow-left me-1"></i> Back
                    </a>

                    <h2 class="reg_from_heading">You’re All Set!</h2>
                    <p class="reg_from_subheading">
                        Your cricket profile is live. The crease is calling let’s start playing and make history.
                    </p>

                    <div class="row g-4 mt-5 mb-5">
                        <div class="col-6">
                            <div class="status-card-wrap">
                                <div class="status-card d-flex flex-column align-items-center justify-content-center">
                                    <span class="text-secondary small mb-1">Season</span>
                                    <h3 class="status-value text-purple">2026</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="status-card-wrap">
                                <div class="status-card d-flex flex-column align-items-center justify-content-center">
                                    <span class="text-secondary small mb-1">Status</span>
                                    <h3 class="status-value text-green">Active</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <a class="cta1 w-100" href="{{ route('team-captain-dashboard') }}">Go to Dashboard</a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.otp-input').forEach((input, index, inputs) => {
        input.addEventListener('input', () => {
            if (input.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value === '' && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });
</script>
