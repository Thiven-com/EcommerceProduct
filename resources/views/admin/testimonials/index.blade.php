
<?php $page = 'testimonials-list'; ?>

@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content">

        {{-- Page Header --}}
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Testimonials</h4>
                    <h6>Manage customer testimonials</h6>
                </div>
            </div>

            <ul class="table-top-head">
                <li class="me-2">
                    <a data-bs-toggle="tooltip"
                       data-bs-placement="top"
                       title="Collapse"
                       id="collapse-header">
                        <i class="ti ti-chevron-up"></i>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Testimonials List --}}
        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">

                <div class="search-set">
                    <h5 class="mb-0">Customer Testimonials</h5>
                </div>

                <form method="GET"
                      action="{{ route('admin.testimonials.index') }}"
                      class="d-flex align-items-center gap-2">

                    <label for="status" class="mb-0">Status:</label>

                    <select name="status"
                            id="status"
                            class="form-select"
                            onchange="this.form.submit()"
                            style="min-width:160px;">

                        <option value="">All Testimonials</option>

                        <option value="pending"
                            {{ request('status') == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="approved"
                            {{ request('status') == 'approved' ? 'selected' : '' }}>
                            Approved
                        </option>

                        <option value="rejected"
                            {{ request('status') == 'rejected' ? 'selected' : '' }}>
                            Rejected
                        </option>

                    </select>
                </form>

            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>S.no</th>
                                <th>Image</th>
                                <th>Customer Name</th>
                                <th>City</th>
                                <th>Rating</th>
                                <th>Testimonial</th>
                                <th>Status</th>
                                <th class="no-sort">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($testimonials as $testimonial)

                                <tr>
                                    {{-- Serial Number --}}
                                    <td>
                                        {{ $testimonials->firstItem() + $loop->index }}
                                    </td>

                                    {{-- Customer Image --}}
                                    <td>
                                        @if($testimonial->image)
                                            <img
                                                src="{{ asset($testimonial->image) }}"
                                                alt="Customer Image"
                                                width="50"
                                                height="50"
                                                style="object-fit:cover;border-radius:50%;">
                                        @else
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                                 style="width:50px;height:50px;">
                                                <i data-feather="user"
                                                   style="color:#999;"></i>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Name --}}
                                    <td>
                                        <h6 class="mb-0">
                                            {{ $testimonial->name }}
                                        </h6>
                                    </td>

                                    {{-- City --}}
                                    <td>
                                        {{ $testimonial->city ?? '-' }}
                                    </td>

                                    {{-- Rating --}}
                                    <td>
                                        <span class="text-warning">
                                            {{ str_repeat('★', (int) $testimonial->rating) }}
                                        </span>
                                        <span class="text-muted">
                                            {{ str_repeat('☆', 5 - (int) $testimonial->rating) }}
                                        </span>
                                    </td>

                                    {{-- Description --}}
                                    <td style="min-width:100px;max-width:1000px;">
                                        {{ \Illuminate\Support\Str::limit($testimonial->description, 20) }}

                                        @if(strlen($testimonial->description) > 20)
                                            <a href="javascript:void(0)"
                                               class="text-primary ms-1 view-testimonial"
                                               data-name="{{ $testimonial->name }}"
                                               data-description="{{ $testimonial->description }}"
                                               data-rating="{{ $testimonial->rating }}">
                                                View
                                            </a>
                                        @endif
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        @if($testimonial->status === 'approved')
                                            <span class="badge bg-success">
                                                Approved
                                            </span>
                                        @elseif($testimonial->status === 'rejected')
                                            <span class="badge bg-danger">
                                                Rejected
                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark">
                                                Pending
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Actions --}}
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">

                                            {{-- Approve --}}
                                            @if($testimonial->status !== 'approved')
                                                <form
                                                    action="{{ route('admin.testimonials.approve', $testimonial->id) }}"
                                                    method="POST"
                                                    class="d-inline me-2">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                            class="btn btn-success btn-sm"
                                                            onclick="return confirm('Approve this testimonial?')">
                                                        <i data-feather="check"
                                                           class="me-1"></i>
                                                        Approve
                                                    </button>
                                                </form>
                                            @endif

                                            {{-- Reject --}}
                                            @if($testimonial->status !== 'rejected')
                                                <form
                                                    action="{{ route('admin.testimonials.reject', $testimonial->id) }}"
                                                    method="POST"
                                                    class="d-inline me-2">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                            class="btn btn-warning btn-sm"
                                                            onclick="return confirm('Reject this testimonial?')">
                                                        <i data-feather="x"
                                                           class="me-1"></i>
                                                        Reject
                                                    </button>
                                                </form>
                                            @endif

                                            {{-- Delete --}}
                                            <a href="javascript:void(0);"
                                               class="confirm-delete-testimonial p-2"
                                               data-url="{{ route('admin.testimonials.destroy', $testimonial->id) }}">

                                                <i data-feather="trash-2"
                                                   class="feather-trash-2"
                                                   style="color:red;"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i data-feather="message-square"
                                               class="mb-2"></i>
                                            <p class="mb-0">
                                                No testimonials found.
                                            </p>
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>

                {{-- Pagination --}}
                <div class="p-3">
                    {{ $testimonials->withQueryString()->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>

    </div>

    {{-- Footer --}}
    <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
        <p class="mb-0">
            2026 &copy; {{ $site->site_name ?? '' }}. All Right Reserved
        </p>

        <p class="mb-0">
            Designed &amp; Developed by
            <a href="javascript:void(0);" class="text-primary">
                {{ $site->site_name ?? '' }}
            </a>
        </p>
    </div>
</div>

{{-- View Full Testimonial Modal --}}
<div class="modal fade" id="view-testimonial-modal"
     tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Customer Testimonial</h5>

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <h6 id="view-testimonial-name"></h6>

                <div class="text-warning mb-3" id="view-testimonial-rating"></div>

                <p id="view-testimonial-description"
                   style="white-space:pre-wrap;"></p>
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="delete-testimonial-modal"
     tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Delete Testimonial</h5>

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete this testimonial?
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <form id="delete-testimonial-form"
                      method="POST" action="">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Yes, Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // View full testimonial
    document.querySelectorAll('.view-testimonial').forEach(function (button) {
        button.addEventListener('click', function () {

            const name = this.dataset.name || '';
            const description = this.dataset.description || '';
            const rating = parseInt(this.dataset.rating || '0', 10);

            document.getElementById('view-testimonial-name').textContent = name;

            document.getElementById('view-testimonial-rating').textContent =
                '★'.repeat(Math.min(5, Math.max(0, rating))) +
                '☆'.repeat(5 - Math.min(5, Math.max(0, rating)));

            document.getElementById('view-testimonial-description').textContent =
                description;

            bootstrap.Modal.getOrCreateInstance(
                document.getElementById('view-testimonial-modal')
            ).show();
        });
    });

    // Delete testimonial confirmation
    document.querySelectorAll('.confirm-delete-testimonial').forEach(function (button) {
        button.addEventListener('click', function () {

            const deleteUrl = this.dataset.url;

            document.getElementById('delete-testimonial-form').action = deleteUrl;

            bootstrap.Modal.getOrCreateInstance(
                document.getElementById('delete-testimonial-modal')
            ).show();
        });
    });

});
</script>

@endsection
