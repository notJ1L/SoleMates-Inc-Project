@extends('layouts.admin')

@section('page-title', 'Products')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
@endsection

@section('topbar-actions')
    <button type="button" class="btn-secondary-admin" id="toggleTrashedBtn" onclick="toggleTrashed()">
        <i class="bi bi-trash3"></i> Show Deleted
    </button>
    <button type="button" class="btn-secondary-admin" data-bs-toggle="modal" data-bs-target="#importModal">
        <i class="bi bi-file-earmark-arrow-up"></i> Import Excel
    </button>
    <a href="{{ route('admin.products.create') }}" class="btn-primary-admin">
        <i class="bi bi-plus-lg"></i> New Product
    </a>
@endsection

@section('content')
<div class="panel">
    <div class="table-responsive">
        <table id="productsTable" class="data-table" style="width:100%">
            <thead>
                <tr>
                    <th style="width:52px;">Photo</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- Import Excel Modal --}}
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">
                    <i class="bi bi-file-earmark-spreadsheet me-2" style="color:var(--green);"></i>Import Products from Excel
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 p-3" style="background:var(--surface-2);border-radius:var(--radius-sm);border:1px solid var(--border);font-size:0.813rem;color:var(--text-secondary);">
                        <div style="font-weight:600;color:var(--text-primary);margin-bottom:0.5rem;">
                            <i class="bi bi-info-circle me-1"></i> Expected column headers:
                        </div>
                        <code style="font-size:0.75rem;">name &nbsp;|&nbsp; description &nbsp;|&nbsp; price &nbsp;|&nbsp; category_id &nbsp;|&nbsp; brand_id &nbsp;|&nbsp; stock</code>
                        <div style="margin-top:0.5rem;font-size:0.75rem;">
                            You may also use <strong>category_name</strong> and <strong>brand_name</strong> instead of IDs.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Select File</label>
                        <input type="file" name="file" class="form-control" accept=".xlsx,.xls,.csv" required
                               style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                        @error('file')
                            <div style="color:var(--red);font-size:0.75rem;margin-top:0.25rem;">{{ $message }}</div>
                        @enderror
                        <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.375rem;">
                            Accepted: .xlsx, .xls, .csv &nbsp;&bull;&nbsp; Max 2 MB
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary-admin" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-primary-admin"><i class="bi bi-upload"></i> Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script>
let showingTrashed = false;

const table = $('#productsTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('admin.products.data') }}',
        data: function(d) {
            d.trashed = showingTrashed ? 1 : 0;
        }
    },
    columns: [
        { data: 'photo',        name: 'photo',        orderable: false, searchable: false },
        { data: 'name_col',     name: 'name' },
        { data: 'category_col', name: 'category.name' },
        { data: 'brand_col',    name: 'brand.name' },
        { data: 'price_col',    name: 'price' },
        { data: 'stock_col',    name: 'stock' },
        { data: 'status_col',   name: 'status_col',   orderable: false, searchable: false },
        { data: 'actions',      name: 'actions',      orderable: false, searchable: false },
    ],
    order: [[1, 'asc']],
    pageLength: 10,
    language: {
        processing: '<div style="padding:1rem;color:var(--text-muted);">Loading...</div>',
        search: '',
        searchPlaceholder: 'Search products...',
        lengthMenu: 'Show _MENU_ per page',
        zeroRecords: '<div style="padding:2rem;text-align:center;color:var(--text-muted);">No products found.</div>',
    },
    dom: '<"dt-top d-flex align-items-center justify-content-between gap-2 mb-3"lf>rt<"dt-bottom d-flex align-items-center justify-content-between mt-3"ip>',
    drawCallback: function() {
        // re-style search/length inputs to match admin theme
        $('.dataTables_filter input').css({
            'border': '1.5px solid var(--c-border)',
            'border-radius': '20px',
            'padding': '0.5rem 1rem 0.5rem 2.5rem',
            'font-size': '0.85rem',
            'background': 'var(--c-off-white)',
            'color': 'var(--c-text)',
            'font-family': 'var(--font-body)',
            'transition': 'all 0.2s cubic-bezier(0.4, 0, 0.2, 1)',
            'margin-left': '0.75rem',
        }).on('focus', function() {
            $(this).css({
                'border-color': 'var(--c-gold)',
                'background': 'var(--c-white)',
                'box-shadow': '0 0 0 3px rgba(200,169,110,0.12)'
            });
        }).on('blur', function() {
            $(this).css({
                'border-color': 'var(--c-border)',
                'background': 'var(--c-off-white)',
                'box-shadow': 'none'
            });
        });

        $('.dataTables_length select').css({
            'border': '1.5px solid var(--c-border)',
            'border-radius': '8px',
            'padding': '0.5rem 0.75rem',
            'font-size': '0.85rem',
            'background': 'var(--c-off-white)',
            'color': 'var(--c-text)',
            'font-family': 'var(--font-body)',
            'margin': '0 0.5rem',
            'cursor': 'pointer',
            'transition': 'all 0.2s cubic-bezier(0.4, 0, 0.2, 1)',
        }).on('focus', function() {
            $(this).css({
                'border-color': 'var(--c-gold)',
                'background': 'var(--c-white)',
                'box-shadow': '0 0 0 3px rgba(200,169,110,0.12)'
            });
        }).on('blur', function() {
            $(this).css({
                'border-color': 'var(--c-border)',
                'background': 'var(--c-off-white)',
                'box-shadow': 'none'
            });
        });
    }
});

function toggleTrashed() {
    showingTrashed = !showingTrashed;
    const btn = document.getElementById('toggleTrashedBtn');
    if (showingTrashed) {
        btn.innerHTML = '<i class="bi bi-box-seam"></i> Show Active';
        btn.style.borderColor = 'var(--c-error)';
        btn.style.color = 'var(--c-error)';
        btn.style.background = 'rgba(192,57,43,0.05)';
    } else {
        btn.innerHTML = '<i class="bi bi-trash3"></i> Show Deleted';
        btn.style.borderColor = '';
        btn.style.color = '';
        btn.style.background = '';
    }
    table.ajax.reload();
}
</script>
@endsection
