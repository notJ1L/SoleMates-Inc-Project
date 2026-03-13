@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('topbar-actions')
    <a href="{{ route('admin.products.create') }}" class="btn-primary-admin">
        <i class="bi bi-plus-lg"></i> New Product
    </a>
@endsection

@section('content')

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon stat-icon-amber"><i class="bi bi-bag"></i></div>
            <div class="stat-body">
                <div class="stat-value">{{ $stats['total_orders'] ?? 0 }}</div>
                <div class="stat-label">Total Orders</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon stat-icon-blue"><i class="bi bi-box-seam"></i></div>
            <div class="stat-body">
                <div class="stat-value">{{ $stats['total_products'] ?? 0 }}</div>
                <div class="stat-label">Products</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon stat-icon-purple"><i class="bi bi-people"></i></div>
            <div class="stat-body">
                <div class="stat-value">{{ $stats['total_users'] ?? 0 }}</div>
                <div class="stat-label">Registered Users</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon stat-icon-green"><i class="bi bi-currency-exchange"></i></div>
            <div class="stat-body">
                <div class="stat-value" style="font-size:1.45rem;">₱{{ number_format($stats['total_revenue'] ?? 0, 0) }}</div>
                <div class="stat-label">Total Revenue</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">

    {{-- Recent Orders Table --}}
    <div class="col-lg-7">
        <div class="panel h-100">
            <div class="panel-header">
                <span class="panel-title">Recent Orders</span>
                <a href="{{ route('admin.orders.index') }}" style="font-size:0.775rem;color:var(--accent);text-decoration:none;font-weight:500;">View all →</a>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders ?? [] as $order)
                        <tr>
                            <td><span class="mono">#{{ $order->id }}</span></td>
                            <td>
                                <div style="font-weight:600;">{{ $order->user->name }}</div>
                                <div class="subtext">{{ $order->user->email }}</div>
                            </td>
                            <td><span class="mono">₱{{ number_format($order->total, 2) }}</span></td>
                            <td><span class="badge-pill badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                            <td><span style="font-size:0.775rem;color:var(--text-muted);">{{ $order->created_at->format('M d, Y') }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-bag"></i>
                                    <p>No orders yet.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="col-lg-5">

        {{-- Pending Orders Alert --}}
        @if(($stats['pending_orders'] ?? 0) > 0)
        <div style="background:rgba(217,119,6,0.07);border:1px solid rgba(217,119,6,0.2);border-radius:var(--radius);padding:1rem 1.125rem;margin-bottom:1rem;display:flex;align-items:center;gap:0.875rem;">
            <div style="width:38px;height:38px;background:var(--amber-light);border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;font-size:1rem;color:var(--amber);flex-shrink:0;">
                <i class="bi bi-clock-history"></i>
            </div>
            <div style="flex:1;">
                <div style="font-weight:650;font-size:0.875rem;">{{ $stats['pending_orders'] }} Pending Order{{ $stats['pending_orders'] > 1 ? 's' : '' }}</div>
                <div style="font-size:0.763rem;color:var(--text-muted);margin-top:1px;">Awaiting your action</div>
            </div>
            <a href="{{ route('admin.orders.index') }}?status=pending" style="font-size:0.75rem;color:var(--amber);text-decoration:none;font-weight:600;white-space:nowrap;">Review →</a>
        </div>
        @endif

        {{-- Low Stock Alert --}}
        @if(isset($lowStockProducts) && $lowStockProducts->count() > 0)
        <div class="panel mb-3">
            <div class="panel-header">
                <span class="panel-title">Low Stock</span>
                <span class="badge-pill badge-cancelled">{{ $lowStockProducts->count() }} items</span>
            </div>
            <div>
                @foreach($lowStockProducts as $p)
                <div style="display:flex;align-items:center;gap:0.75rem;padding:0.625rem 1.125rem;border-bottom:1px solid var(--border);">
                    <div style="flex:1;min-width:0;">
                        <div style="font-size:0.838rem;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $p->name }}</div>
                        <div class="subtext">{{ $p->brand }}</div>
                    </div>
                    <span class="text-mono" style="font-size:0.775rem;color:{{ $p->stock == 0 ? 'var(--red)' : 'var(--amber)' }};">{{ $p->stock }} left</span>
                    <a href="{{ route('admin.products.edit', $p->id) }}" class="action-btn" title="Edit" style="text-decoration:none;"><i class="bi bi-pencil"></i></a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- New Users --}}
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">New Users</span>
                <a href="{{ route('admin.users.index') }}" style="font-size:0.775rem;color:var(--accent);text-decoration:none;font-weight:500;">View all →</a>
            </div>
            <div>
                @forelse($recentUsers ?? [] as $user)
                <div style="display:flex;align-items:center;gap:0.75rem;padding:0.625rem 1.125rem;border-bottom:1px solid var(--border);">
                    <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-size:0.838rem;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $user->name }}</div>
                        <div class="subtext" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $user->email }}</div>
                    </div>
                    <span style="font-size:0.7rem;color:var(--text-muted);white-space:nowrap;">{{ $user->created_at->diffForHumans() }}</span>
                </div>
                @empty
                <div class="empty-state">
                    <i class="bi bi-person"></i>
                    <p>No users yet.</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

@endsection


@section('content')

{{-- Stats Row --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-bag"></i></div>
            <div class="stat-value">{{ $stats['total_orders'] ?? 0 }}</div>
            <div class="stat-label">Total Orders</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
            <div class="stat-value">{{ $stats['total_products'] ?? 0 }}</div>
            <div class="stat-label">Products</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-people"></i></div>
            <div class="stat-value">{{ $stats['total_users'] ?? 0 }}</div>
            <div class="stat-label">Registered Users</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-currency-dollar"></i></div>
            <div class="stat-value">₱{{ number_format($stats['total_revenue'] ?? 0, 0) }}</div>
            <div class="stat-label">Total Revenue</div>
        </div>
    </div>
</div>

<div class="row g-3">

    {{-- Recent Orders --}}
    <div class="col-lg-7">
        <div style="background:var(--white);border-radius:6px;border:1px solid rgba(0,0,0,0.07);overflow:hidden;">
            <div style="padding:1.1rem 1.5rem; border-bottom:1px solid rgba(0,0,0,0.07); display:flex; justify-content:space-between; align-items:center;">
                <div style="font-family:var(--font-display);font-size:1.05rem;font-weight:700;">Recent Orders</div>
                <a href="{{ route('admin.orders.index') }}" style="font-size:0.75rem;color:var(--accent);text-decoration:none;">View all →</a>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders ?? [] as $order)
                        <tr>
                            <td><span style="font-family:var(--font-mono);font-size:0.75rem;">#{{ $order->id }}</span></td>
                            <td>
                                <div style="font-size:0.85rem;font-weight:600;">{{ $order->user->name }}</div>
                                <div style="font-size:0.72rem;color:var(--warm-gray);">{{ $order->user->email }}</div>
                            </td>
                            <td><span style="font-family:var(--font-mono);font-size:0.85rem;">₱{{ number_format($order->total, 2) }}</span></td>
                            <td>
                                <span class="badge-status badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td><span style="font-size:0.75rem;color:var(--warm-gray);">{{ $order->created_at->format('M d') }}</span></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" style="text-align:center;color:var(--warm-gray);padding:2rem;font-size:0.85rem;">No orders yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Right column --}}
    <div class="col-lg-5">
        {{-- Pending orders alert --}}
        @if(($stats['pending_orders'] ?? 0) > 0)
        <div style="background:rgba(200,169,110,0.12);border:1px solid rgba(200,169,110,0.3);border-radius:6px;padding:1.25rem;margin-bottom:1rem;display:flex;align-items:center;gap:1rem;">
            <div style="width:44px;height:44px;background:var(--accent);border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;">
                <i class="bi bi-clock"></i>
            </div>
            <div>
                <div style="font-weight:700;font-size:0.9rem;">{{ $stats['pending_orders'] }} Pending Order{{ $stats['pending_orders'] > 1 ? 's' : '' }}</div>
                <div style="font-size:0.78rem;color:var(--warm-gray);margin-top:2px;">Need your attention</div>
            </div>
            <a href="{{ route('admin.orders.index') }}?status=pending" style="margin-left:auto;font-size:0.75rem;color:var(--accent);text-decoration:none;white-space:nowrap;">View →</a>
        </div>
        @endif

        {{-- Low stock alert --}}
        @if(isset($lowStockProducts) && $lowStockProducts->count() > 0)
        <div style="background:var(--white);border-radius:6px;border:1px solid rgba(0,0,0,0.07);overflow:hidden;">
            <div style="padding:1rem 1.5rem;border-bottom:1px solid rgba(0,0,0,0.07);display:flex;justify-content:space-between;align-items:center;">
                <div style="font-family:var(--font-display);font-size:1rem;font-weight:700;">Low Stock Alert</div>
                <span style="font-family:var(--font-mono);font-size:0.65rem;background:rgba(192,57,43,0.12);color:var(--red);padding:3px 10px;border-radius:20px;">{{ $lowStockProducts->count() }} items</span>
            </div>
            <div style="padding:0.5rem 0;">
                @foreach($lowStockProducts as $p)
                <div style="display:flex;align-items:center;gap:0.75rem;padding:0.6rem 1.25rem;border-bottom:1px solid rgba(0,0,0,0.04);">
                    <div style="flex:1;">
                        <div style="font-size:0.83rem;font-weight:600;">{{ $p->name }}</div>
                        <div style="font-size:0.7rem;color:var(--warm-gray);">{{ $p->brand }}</div>
                    </div>
                    <span style="font-family:var(--font-mono);font-size:0.75rem;color:{{ $p->stock == 0 ? 'var(--red)' : '#c09b00' }};">
                        {{ $p->stock }} left
                    </span>
                    <a href="{{ route('admin.products.edit', $p->id) }}" style="font-size:0.75rem;color:var(--accent);">Edit</a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Recent registrations --}}
        <div style="background:var(--white);border-radius:6px;border:1px solid rgba(0,0,0,0.07);overflow:hidden;margin-top:1rem;">
            <div style="padding:1rem 1.5rem;border-bottom:1px solid rgba(0,0,0,0.07);display:flex;justify-content:space-between;align-items:center;">
                <div style="font-family:var(--font-display);font-size:1rem;font-weight:700;">New Users</div>
                <a href="{{ route('admin.users.index') }}" style="font-size:0.75rem;color:var(--accent);text-decoration:none;">View all →</a>
            </div>
            <div style="padding:0.5rem 0;">
                @forelse($recentUsers ?? [] as $user)
                <div style="display:flex;align-items:center;gap:0.75rem;padding:0.6rem 1.25rem;border-bottom:1px solid rgba(0,0,0,0.04);">
                    <div style="width:34px;height:34px;border-radius:50%;background:var(--accent);display:flex;align-items:center;justify-content:center;font-size:0.85rem;font-weight:700;color:var(--black);flex-shrink:0;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-size:0.83rem;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $user->name }}</div>
                        <div style="font-size:0.7rem;color:var(--warm-gray);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $user->email }}</div>
                    </div>
                    <span style="font-size:0.68rem;color:var(--warm-gray);">{{ $user->created_at->diffForHumans() }}</span>
                </div>
                @empty
                    <div style="text-align:center;padding:1.5rem;color:var(--warm-gray);font-size:0.83rem;">No users yet.</div>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection
