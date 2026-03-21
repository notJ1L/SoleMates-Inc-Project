@extends('layouts.admin')

@section('page-title', 'Reviews')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="filter-bar">
    <div class="d-flex align-items-center gap-2 flex-wrap w-100">
        <i class="bi bi-funnel" style="color:var(--c-text-muted);font-size:0.9rem;"></i>
        <select id="filterRating" class="form-select" style="width:150px;">
            <option value="">All Ratings</option>
            <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733; (5)</option>
            <option value="4">&#9733;&#9733;&#9733;&#9733; (4)</option>
            <option value="3">&#9733;&#9733;&#9733; (3)</option>
            <option value="2">&#9733;&#9733; (2)</option>
            <option value="1">&#9733; (1)</option>
        </select>
        <input id="filterSearch" type="text" class="form-control" style="max-width:280px;flex:1;" placeholder="Search by customer or product...">
        <button type="button" onclick="applyReviewFilters()" class="btn-secondary-admin">
            <i class="bi bi-search"></i> Search
        </button>
        <button type="button" onclick="clearReviewFilters()" id="clearReviewFiltersBtn" class="btn-secondary-admin" style="display:none;color:var(--c-error);">
            <i class="bi bi-x-lg"></i> Clear
        </button>
    </div>
</div>

<div class="panel">
    <div class="table-responsive">
        <table id="reviewsTable" class="data-table" style="width:100%">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Date</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div id="reviews-outer-nav" class="d-flex justify-content-between align-items-center mt-4 px-1"></div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script>
$('#reviewsTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('admin.reviews.data') }}',
        data: function(d) {
            d.rating_filter = $('#filterRating').val();
            d.search.value  = $('#filterSearch').val();
        }
    },
    columns: [
        { data: 'user_col',    name: 'user.name' },
        { data: 'product_col', name: 'product.name' },
        { data: 'rating_col',  name: 'rating',     searchable: false },
        { data: 'body_col',    name: 'body' },
        { data: 'date_col',    name: 'created_at', searchable: false },
        { data: 'actions',     name: 'actions',    orderable: false, searchable: false },
    ],
    order: [[4, 'desc']],
    pageLength: 15,
    language: {
        processing: '<div style="padding:1rem;color:var(--text-muted);">Loading...</div>',
        search: '',
        searchPlaceholder: 'Search reviews...',
        lengthMenu: 'Show _MENU_ per page',
        zeroRecords: '<div style="padding:2rem;text-align:center;color:var(--text-muted);">No reviews found.</div>',
        paginate: { previous: '&#x2039;', next: '&#x203A;' },
    },
    dom: 'rtip',
    initComplete: function() {
        var wrapper = this.api().table().container();
        var $info  = $(wrapper).find('.dataTables_info').detach();
        var $pager = $(wrapper).find('.dataTables_paginate').detach();
        $('#reviews-outer-nav').append($info).append($pager);
    },
    drawCallback: function() {
    }
});

function applyReviewFilters() {
    const hasFilters = $('#filterRating').val() || $('#filterSearch').val();
    $('#clearReviewFiltersBtn').toggle(!!hasFilters);
    $('#reviewsTable').DataTable().ajax.reload();
}

function clearReviewFilters() {
    $('#filterRating').val('');
    $('#filterSearch').val('');
    $('#clearReviewFiltersBtn').hide();
    $('#reviewsTable').DataTable().ajax.reload();
}

$('#filterSearch').on('keydown', function(e) { if (e.key === 'Enter') applyReviewFilters(); });
</script>
@endsection
