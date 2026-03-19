@extends('layouts.admin')

@section('title', 'Charts & Analytics')
@section('page-title', 'Charts & Analytics')

@section('content')

<div class="row g-4">

    {{-- ══════════════════════════════════════════════════════
         1. YEARLY SALES BAR CHART
    ════════════════════════════════════════════════════════ --}}
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">
                    <i class="bi bi-bar-chart-line" style="color:var(--accent);margin-right:6px;"></i>
                    Yearly Sales — {{ $currentYear }}
                </span>
                <span style="font-size:0.775rem;color:var(--text-muted);">Completed orders · monthly breakdown</span>
            </div>
            <div style="padding:1.25rem 1.25rem 1rem;position:relative;height:300px;">
                <canvas id="yearlyChart"></canvas>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════
         2. DATE RANGE SALES BAR CHART
    ════════════════════════════════════════════════════════ --}}
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">
                    <i class="bi bi-calendar-range" style="color:var(--blue);margin-right:6px;"></i>
                    Sales by Date Range
                </span>
            </div>
            <div style="padding:1.25rem;">

                <form id="rangeForm" class="d-flex flex-wrap gap-3 align-items-end mb-4">
                    <div>
                        <label class="form-label mb-1"
                               style="font-size:0.78rem;color:var(--text-secondary);font-weight:500;">
                            From
                        </label>
                        <input type="date" id="rangeStart" class="form-control form-control-sm"
                               value="{{ now()->subDays(30)->format('Y-m-d') }}"
                               max="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div>
                        <label class="form-label mb-1"
                               style="font-size:0.78rem;color:var(--text-secondary);font-weight:500;">
                            To
                        </label>
                        <input type="date" id="rangeEnd" class="form-control form-control-sm"
                               value="{{ now()->format('Y-m-d') }}"
                               max="{{ now()->format('Y-m-d') }}">
                    </div>
                    <button type="submit" class="btn-primary-admin">
                        <i class="bi bi-arrow-clockwise"></i> Update Chart
                    </button>
                </form>

                <div id="rangeWrap" style="position:relative;height:280px;">
                    <canvas id="rangeChart"></canvas>
                </div>
                <div id="rangeEmpty" class="empty-state" style="display:none;">
                    <i class="bi bi-bar-chart" style="font-size:2rem;opacity:0.3;"></i>
                    <p>No completed orders in this date range.</p>
                </div>

            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════
         3. PRODUCT SALES PIE CHART
    ════════════════════════════════════════════════════════ --}}
    <div class="col-lg-6">
        <div class="panel h-100">
            <div class="panel-header">
                <span class="panel-title">
                    <i class="bi bi-pie-chart" style="color:var(--purple);margin-right:6px;"></i>
                    Sales by Product
                </span>
                <span style="font-size:0.775rem;color:var(--text-muted);">% share of total revenue</span>
            </div>
            <div style="padding:1.25rem;display:flex;align-items:center;justify-content:center;min-height:320px;">
                @if($productSales->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-pie-chart" style="font-size:2rem;opacity:0.3;"></i>
                        <p>No completed orders yet.</p>
                    </div>
                @else
                    <canvas id="pieChart" style="max-height:300px;"></canvas>
                @endif
            </div>
        </div>
    </div>

    {{-- 3b. Pie Legend / Revenue Breakdown Table --}}
    <div class="col-lg-6">
        <div class="panel h-100">
            <div class="panel-header">
                <span class="panel-title">Product Revenue Breakdown</span>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-end">Revenue</th>
                            <th class="text-end">Share</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = $productSales->sum('total'); @endphp
                        @forelse($productSales as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td class="text-end" style="font-family:var(--font-mono);font-size:0.82rem;">
                                &#8369;{{ number_format($row->total, 2) }}
                            </td>
                            <td class="text-end">
                                @if($grandTotal > 0)
                                    <span class="badge-pill badge-completed">
                                        {{ number_format($row->total / $grandTotal * 100, 1) }}%
                                    </span>
                                @else
                                    <span class="badge-pill" style="background:var(--surface-2);color:var(--text-muted);">0%</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state">
                                    <p>No sales data yet.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script>
    Chart.defaults.font.family = "'Inter', -apple-system, sans-serif";
    Chart.defaults.color       = '#6B6560';

    /* ─── 1. Yearly Sales Bar Chart ──────────────────────────────── */
    new Chart(document.getElementById('yearlyChart'), {
        type: 'bar',
        data: {
            labels: @json($monthNames),
            datasets: [{
                label: 'Revenue (₱)',
                data:  @json($yearlyData),
                backgroundColor: 'rgba(200,169,110,0.78)',
                borderColor:     '#C8A96E',
                borderWidth:     1,
                borderRadius:    5,
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
                    ticks: {
                        callback: v => '₱' + (v >= 1000 ? (v / 1000).toFixed(1) + 'k' : v)
                    }
                }
            }
        }
    });

    /* ─── 2. Date Range Bar Chart (AJAX) ─────────────────────────── */
    const rangeCtx = document.getElementById('rangeChart').getContext('2d');
    let rangeChart = new Chart(rangeCtx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Revenue (₱)',
                data: [],
                backgroundColor: 'rgba(37,99,235,0.72)',
                borderColor:     '#2563EB',
                borderWidth:     1,
                borderRadius:    5,
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
                x: { grid: { display: false }, ticks: { maxRotation: 45, minRotation: 0 } },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: v => '₱' + (v >= 1000 ? (v / 1000).toFixed(1) + 'k' : v)
                    }
                }
            }
        }
    });

    async function loadRangeChart() {
        const start = document.getElementById('rangeStart').value;
        const end   = document.getElementById('rangeEnd').value;
        if (!start || !end) return;

        const res  = await fetch(
            `{{ route('admin.charts.salesRange') }}?start=${encodeURIComponent(start)}&end=${encodeURIComponent(end)}`,
            { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } }
        );
        const json = await res.json();

        const wrap  = document.getElementById('rangeWrap');
        const empty = document.getElementById('rangeEmpty');

        if (!json.data || json.data.length === 0) {
            wrap.style.display  = 'none';
            empty.style.display = 'block';
            return;
        }

        wrap.style.display  = 'block';
        empty.style.display = 'none';

        rangeChart.data.labels                  = json.labels;
        rangeChart.data.datasets[0].data        = json.data;
        rangeChart.update();
    }

    document.getElementById('rangeForm').addEventListener('submit', e => {
        e.preventDefault();
        loadRangeChart();
    });

    // Load immediately with default date values
    loadRangeChart();

    /* ─── 3. Product Sales Pie Chart ─────────────────────────────── */
    @if($productSales->isNotEmpty())
    const pieColors = [
        '#C8A96E','#2563EB','#16A34A','#7C3AED','#D97706',
        '#DC2626','#0891B2','#DB2777','#65A30D','#EA580C',
        '#6366F1','#14B8A6','#F59E0B','#EF4444','#8B5CF6',
    ];

    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: @json($productSales->pluck('name')),
            datasets: [{
                data: @json($productSales->pluck('total')->map(fn($v) => round((float) $v, 2))->values()),
                backgroundColor: pieColors.slice(0, {{ $productSales->count() }}),
                borderColor:     '#FFFFFF',
                borderWidth:     2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 14, boxWidth: 13, font: { size: 11 } }
                },
                tooltip: {
                    callbacks: {
                        label: ctx => {
                            const val   = ctx.parsed;
                            const total = ctx.dataset.data.reduce((a, b) => a + b, 0);
                            const pct   = total > 0 ? (val / total * 100).toFixed(1) : '0.0';
                            return ` ₱${val.toLocaleString('en-PH', { minimumFractionDigits: 2 })}  (${pct}%)`;
                        }
                    }
                }
            }
        }
    });
    @endif
</script>
@endsection
