<?php $__env->startSection('page-title', 'Users'); ?>

<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <button type="button" class="btn-secondary-admin" id="toggleTrashedBtn" onclick="toggleTrashed()">
        <i class="bi bi-trash3"></i> Show Deleted
    </button>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn-primary-admin">
        <i class="bi bi-person-plus"></i> New User
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="filter-bar">
    <div class="d-flex align-items-center gap-2 flex-wrap w-100">
        <i class="bi bi-funnel" style="color:var(--c-text-muted);font-size:0.9rem;"></i>
        <select id="filterRole" class="form-select" style="width:140px;">
            <option value="">All Roles</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <select id="filterStatus" class="form-select" style="width:150px;">
            <option value="">All Statuses</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        <input id="filterSearch" type="text" class="form-control" style="max-width:280px;flex:1;" placeholder="Search by name or email...">
        <button type="button" onclick="applyUserFilters()" class="btn-secondary-admin">
            <i class="bi bi-search"></i> Search
        </button>
        <button type="button" onclick="clearUserFilters()" id="clearUserFiltersBtn" class="btn-secondary-admin" style="display:none;color:var(--c-error);">
            <i class="bi bi-x-lg"></i> Clear
        </button>
    </div>
</div>

<div class="panel">
    <div class="table-responsive">
        <table id="usersTable" class="data-table" style="width:100%">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div id="users-outer-nav" class="d-flex justify-content-between align-items-center mt-4 px-1"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script>
let showingTrashed = false;

const usersTable = $('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '<?php echo e(route('admin.users.data')); ?>',
        data: function(d) {
            d.trashed       = showingTrashed ? 1 : 0;
            d.role_filter   = $('#filterRole').val();
            d.status_filter = $('#filterStatus').val();
            d.search.value  = $('#filterSearch').val();
        }
    },
    columns: [
        { data: 'avatar_col', name: 'name',       orderable: true,  searchable: true },
        { data: 'email',      name: 'email' },
        { data: 'role_col',   name: 'role' },
        { data: 'status_col', name: 'is_active',  orderable: true,  searchable: false },
        { data: 'joined_col', name: 'created_at', searchable: false },
        { data: 'actions',    name: 'actions',    orderable: false,  searchable: false },
    ],
    order: [[0, 'asc']],
    pageLength: 10,
    language: {
        processing: '<div style="padding:1rem;color:var(--text-muted);">Loading...</div>',
        search: '',
        searchPlaceholder: 'Search users...',
        lengthMenu: 'Show _MENU_ per page',
        zeroRecords: '<div style="padding:2rem;text-align:center;color:var(--text-muted);">No users found.</div>',
        paginate: { previous: '&#x2039;', next: '&#x203A;' },
    },
    dom: 'rtip',
    initComplete: function() {
        var wrapper = this.api().table().container();
        var $info  = $(wrapper).find('.dataTables_info').detach();
        var $pager = $(wrapper).find('.dataTables_paginate').detach();
        $('#users-outer-nav').append($info).append($pager);
    },
    drawCallback: function() {
    }
});

function applyUserFilters() {
    const hasFilters = $('#filterRole').val() || $('#filterStatus').val() || $('#filterSearch').val();
    $('#clearUserFiltersBtn').toggle(!!hasFilters);
    usersTable.ajax.reload();
}

function clearUserFilters() {
    $('#filterRole, #filterStatus').val('');
    $('#filterSearch').val('');
    $('#clearUserFiltersBtn').hide();
    usersTable.ajax.reload();
}

$('#filterSearch').on('keydown', function(e) { if (e.key === 'Enter') applyUserFilters(); });

function toggleTrashed() {
    showingTrashed = !showingTrashed;
    const btn = document.getElementById('toggleTrashedBtn');
    if (showingTrashed) {
        btn.innerHTML = '<i class="bi bi-people"></i> Show Active';
        btn.style.borderColor = 'var(--red)';
        btn.style.color = 'var(--red)';
    } else {
        btn.innerHTML = '<i class="bi bi-trash3"></i> Show Deleted';
        btn.style.borderColor = '';
        btn.style.color = '';
    }
    usersTable.ajax.reload();
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views\admin\users\index.blade.php ENDPATH**/ ?>