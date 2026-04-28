@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">

                <!-- Left -->
                <div>
                    <h5 class="mb-0 text-uppercase fw-bold">Match Information</h5>
                    <small class="text-muted">View Match details</small>
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

                <h6 class="mb-0 fw-bold">Match List</h6>

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
                            <th width="60">S.No</th>
                            <th>Type</th>
                            <th class="text-start">Name</th>
                            <th>Slots</th>
                            <th class="text-start">Location</th>
                            <th>Entry Fee</th>
                            <th>Start Date</th>
                            <th>Posted</th>
                            <th>Modified </th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($tornaments as $tornament)
                            <tr>
                                <td>1</td>
                                <td><span class="badge bg-primary">{{ $tornament->type }}</span></td>
                                <td class="text-start fw-semibold">{{ $tornament->name }}</td>
                                <td>{{ $tornament->slots }}</td>
                                <td class="text-start">{{ $tornament->location }}</td>
                                <td>{{ $tornament->entry_fee }}</td>
                                <td>{{ $tornament->start_date }}</td>
                                <td>{{ $tornament->created_at }}</td>
                                <td>{{ $tornament->updated_at }}</td>
                                <td>
                                    <a href="{{ route('matches.show', $tornament->id) }}"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="card-body d-flex justify-content-between align-items-center">

                <div class="text-muted small">
                    Showing {{ $tornaments->firstItem() }} to {{ $tornaments->lastItem() }}
                    of {{ $tornaments->total() }} entries
                </div>

                {{ $tornaments->links() }}

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
