


<?php $__env->startSection('page-title', 'Users'); ?>

<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn-primary-admin">
        <i class="bi bi-person-plus"></i> New User
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
$('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '<?php echo e(route('admin.users.data')); ?>',
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
    dom: '<"dt-top d-flex align-items-center justify-content-between gap-2 mb-3"lf>rtip',
    initComplete: function() {
        var wrapper = this.api().table().container();
        var $info  = $(wrapper).find('.dataTables_info').detach();
        var $pager = $(wrapper).find('.dataTables_paginate').detach();
        $('#users-outer-nav').append($info).append($pager);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/admin/users/index.blade.php ENDPATH**/ ?>