@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('topbar-actions')
    {{-- no additional actions for dashboard --}}
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

{{-- ═══════════════════════════════════════════════════════════════
     CHARTS ROW
════════════════════════════════════════════════════════════════ --}}
<div class="row g-3 mt-1">

    {{-- Yearly Sales Bar Chart --}}
    <div class="col-lg-7">
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">
                    <i class="bi bi-bar-chart-line" style="color:var(--accent);margin-right:6px;"></i>
                    Yearly Sales — {{ $currentYear ?? now()->year }}
                </span>
                <a href="{{ route('admin.charts.index') }}" style="font-size:0.775rem;color:var(--accent);text-decoration:none;font-weight:500;">Full report →</a>
            </div>
            <div style="padding:1rem 1.25rem 0.75rem;position:relative;height:240px;">
                <canvas id="dashYearlyChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Product Sales Pie Chart --}}
    <div class="col-lg-5">
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">
                    <i class="bi bi-pie-chart" style="color:var(--purple);margin-right:6px;"></i>
                    Sales by Product
                </span>
                <span style="font-size:0.75rem;color:var(--text-muted);">% of total revenue</span>
            </div>
            <div style="padding:1rem 1.25rem 0.75rem;display:flex;align-items:center;justify-content:center;height:240px;">
                @if(isset($productSales) && $productSales->isNotEmpty())
                    <canvas id="dashPieChart"></canvas>
                @else
                    <div class="empty-state">
                        <i class="bi bi-pie-chart" style="font-size:2rem;opacity:0.3;"></i>
                        <p>No completed orders yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
@php
    $dashMonthNames = $monthNames ?? ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $dashYearlyData = $yearlyData ?? array_fill(0, 12, 0);
    $dashYear       = $currentYear ?? now()->year;
@endphp
<script src="{{ asset('js/chart.umd.js') }}"></script>
<script>
    Chart.defaults.font.family = "'Inter', -apple-system, sans-serif";
    Chart.defaults.color       = '#6B6560';

    /* Yearly Sales Bar */
    new Chart(document.getElementById('dashYearlyChart'), {
        type: 'bar',
        data: {
            labels: @json($dashMonthNames),
            datasets: [{
                label: 'Revenue (₱)',
                data:  @json($dashYearlyData),
                backgroundColor: 'rgba(200,169,110,0.78)',
                borderColor:     '#C8A96E',
                borderWidth:     1,
                borderRadius:    4,
                borderSkipped:   false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => ' ₱' + ctx.parsed.y.toLocaleString('en-PH', { minimumFractionDigits: 2 })
                    }
                }
            },
            scales: {
                x: { grid: { display: false } },
                y: {
                    beginAtZero: true,
                    ticks: { callback: v => '₱' + (v >= 1000 ? (v / 1000).toFixed(1) + 'k' : v) }
                }
            }
        }
    });

    /* Product Pie */
    @if(isset($productSales) && $productSales->isNotEmpty())
    const _pieColors = [
        '#C8A96E','#2563EB','#16A34A','#7C3AED','#D97706',
        '#DC2626','#0891B2','#DB2777','#65A30D','#EA580C',
    ];
    new Chart(document.getElementById('dashPieChart'), {
        type: 'pie',
        data: {
            labels: @json($productSales->pluck('name')),
            datasets: [{
                data: @json($productSales->pluck('total')->map(fn($v) => round((float)$v, 2))->values()),
                backgroundColor: _pieColors.slice(0, {{ $productSales->count() }}),
                borderColor: '#fff',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { padding: 10, boxWidth: 12, font: { size: 10 } } },
                tooltip: {
                    callbacks: {
                        label: ctx => {
                            const total = ctx.dataset.data.reduce((a,b) => a+b, 0);
                            const pct   = total > 0 ? (ctx.parsed / total * 100).toFixed(1) : '0.0';
                            return ` ₱${ctx.parsed.toLocaleString('en-PH',{minimumFractionDigits:2})} (${pct}%)`;
                        }
                    }
                }
            }
        }
    });
    @endif
</script>
@endsection
