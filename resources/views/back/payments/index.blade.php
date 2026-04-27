@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">

                <!-- Left -->
                <div>
                    <h5 class="mb-0 text-uppercase fw-bold">Payment Information</h5>
                    <small class="text-muted">View Payment details</small>
                </div>

                <!-- Right -->
                <div class="d-flex align-items-center gap-2">

                    <input type="text" class="form-control form-control-sm" style="width: 200px;"
                        placeholder="🔍 Search...">

                    <button class="btn btn-outline-primary btn-sm">
                        <i class="bx bx-download"></i> CSV
                    </button>

                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bx bx-file"></i> PDF
                    </button>

                </div>

            </div>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow-sm">

            <!-- Top Controls -->
            <div class="card-body d-flex justify-content-between align-items-center">

                <h6 class="mb-0 fw-bold">Payments List</h6>

                <div class="d-flex gap-2">

                    <input type="text" class="form-control form-control-sm" style="width: 220px;"
                        placeholder="🔍 Search tournament...">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="bg-light text-center">
                        <tr>
                            <th>S.No</th>
                            <th>Team Name</th>
                            <th>Tournament</th>
                            <th>Amount</th>
                            <th>Payment ID</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @forelse($payments as $key => $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->player->team_name ?? '-' }}</td>
                                <td>{{ $payment->tournament->name ?? '-' }}</td>
                                <td>₹{{ $payment->amount }}</td>
                                <td>{{ $payment->razorpay_payment_id }}</td>
                                <td>
                                    <span
                                        class="badge 
                                            {{ $payment->status == 'success' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <td>{{ $payment->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No payments found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="card-body d-flex justify-content-between align-items-center">

                <div class="text-muted small">
                    Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }}
                    of {{ $payments->total() }} entries
                </div>

                {{ $payments->links() }}

            </div>

        </div>

    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Delete Tournament</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <i class="bx bx-trash text-danger" style="font-size: 40px;"></i>
                <p class="mt-3 mb-0">Are you sure you want to delete this tournament?</p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button" class="btn btn-danger btn-sm">
                    Yes, Delete
                </button>
            </div>

        </div>
    </div>
</div>

@include('back.includes.footer')
