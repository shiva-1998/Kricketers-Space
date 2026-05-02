@include('back.includes.header')

<div class="page-wrapper">
    <div class="page-content">

        <!-- Header -->
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">

                <!-- Left -->
                <div>
                    <h5 class="mb-0 text-uppercase fw-bold">Grounds Information</h5>
                    <small class="text-muted">View Grounds details</small>
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

                <h6 class="mb-0 fw-bold">Grounds List</h6>

                <div class="d-flex gap-2">

                    <input type="text" class="form-control form-control-sm" style="width: 220px;"
                        placeholder="🔍 Search Grounds...">
                    <a href="{{ route('grounds.create') }}" class="btn btn-success btn-sm">
                        <i class="bx bx-plus"></i> Add Ground
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="bg-light text-center">
                        <tr>
                            <th width="60">S.No</th>
                            <th>Type</th>
                            <th class="text-start">Ground Name</th>
                            <th>Capacity</th>
                            <th class="text-start">Location</th>
                            <th>Pitch</th>
                            {{-- <th>Floodlights</th> --}}
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($grounds as $index => $ground)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ ucfirst($ground->ground_type) }}
                                    </span>
                                </td>
                                <td class="text-start fw-semibold">
                                    {{ $ground->name }}
                                </td>
                                <td>{{ $ground->capacity }}</td>
                                <td class="text-start">
                                    {{ $ground->location }}, {{ $ground->city }}
                                </td>

                                <td>{{ $ground->pitch_type }}</td>
                                <td>{{ $ground->booking_price }}</td>
                                <td>{{ $ground->status }}</td>
                                <td>{{ $ground->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('grounds.edit', $ground->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('grounds.destroy', $ground->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="card-body d-flex justify-content-between align-items-center">

                <div class="text-muted small">
                    Showing {{ $grounds->firstItem() }} to {{ $grounds->lastItem() }}
                    of {{ $grounds->total() }} entries
                </div>

                {{ $grounds->links() }}

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
