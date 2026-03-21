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
    ajax: '{{ route('admin.reviews.data') }}',
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
    dom: '<"dt-top d-flex align-items-center justify-content-between gap-2 mb-3"lf>rtip',
    initComplete: function() {
        var wrapper = this.api().table().container();
        var $info  = $(wrapper).find('.dataTables_info').detach();
        var $pager = $(wrapper).find('.dataTables_paginate').detach();
        $('#reviews-outer-nav').append($info).append($pager);
    },
    drawCallback: function() {
        $('.dataTables_filter input').css({
            'border': '1px solid var(--border)',
            'border-radius': 'var(--radius-sm)',
            'padding': '0.425rem 0.75rem',
            'font-size': '0.838rem',
            'background': 'var(--surface-2)',
            'margin-left': '0.5rem',
        });
        $('.dataTables_length select').css({
            'border': '1px solid var(--border)',
            'border-radius': 'var(--radius-sm)',
            'padding': '0.425rem 0.5rem',
            'font-size': '0.838rem',
            'background': 'var(--surface-2)',
            'margin': '0 0.375rem',
        });
    }
});
</script>
@endsection
