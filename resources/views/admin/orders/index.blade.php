@extends('layouts.admin')

@section('page-title', 'Orders')

@section('content')

<div class="filter-bar">
    <form method="GET" class="d-flex align-items-center gap-2 flex-wrap w-100">
        <i class="bi bi-funnel" style="color:var(--text-muted);font-size:0.9rem;"></i>
        <select name="status" class="form-select" style="width:160px;" onchange="this.form.submit()">
            <option value="">All Statuses</option>
            <option value="pending"    {{ request('status') == 'pending'    ? 'selected' : '' }}>Pending</option>
            <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
            <option value="shipped"    {{ request('status') == 'shipped'    ? 'selected' : '' }}>Shipped</option>
            <option value="completed"  {{ request('status') == 'completed'  ? 'selected' : '' }}>Completed</option>
            <option value="cancelled"  {{ request('status') == 'cancelled'  ? 'selected' : '' }}>Cancelled</option>
        </select>
        <input type="text" name="search" class="form-control" style="max-width:280px;flex:1;"
               placeholder="Search by order ID or customer…" value="{{ request('search') }}">
        <button type="submit" class="btn-secondary-admin">
            <i class="bi bi-search"></i> Search
        </button>
        @if(request('status') || request('search'))
        <a href="{{ route('admin.orders.index') }}" class="btn-secondary-admin" style="color:var(--red);">
            <i class="bi bi-x-lg"></i> Clear
        </a>
        @endif
    </form>
</div>

<div class="panel">
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td><span class="mono">#{{ $order->id }}</span></td>
                    <td>
                        <div style="font-weight:600;">{{ $order->user->name }}</div>
                        <div class="subtext">{{ $order->user->email }}</div>
                    </td>
                    <td>
                        <div style="font-size:0.838rem;font-weight:500;">{{ $order->orderItems->count() }} item{{ $order->orderItems->count() != 1 ? 's' : '' }}</div>
                        <div class="subtext">{{ Str::limit($order->orderItems->first()->product->name ?? '—', 28) }}</div>
                    </td>
                    <td><span class="mono">₱{{ number_format($order->total, 2) }}</span></td>
                    <td><span class="badge-pill badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                    <td>
                        <div style="font-size:0.813rem;">{{ $order->created_at->format('M d, Y') }}</div>
                        <div class="subtext">{{ $order->created_at->diffForHumans() }}</div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">
                            <button type="button" class="action-btn" title="View Details"
                                    data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                            @if($order->status !== 'completed')
                            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" class="action-btn success" title="Mark Completed"
                                        onclick="return confirm('Mark this order as completed?')">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <i class="bi bi-bag-x"></i>
                            <p>No orders found.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($orders->hasPages())
  <div class="d-flex justify-content-center align-items-center mt-4">
    {{ $orders->links() }}
@endif

{{-- Order Detail Modals --}}
@foreach ($orders as $order)
<div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel{{ $order->id }}">
                    Order <span class="text-mono">#{{ $order->id }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div style="font-size:0.69rem;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;color:var(--text-muted);margin-bottom:0.625rem;">Customer</div>
                        <div style="font-weight:650;font-size:0.9rem;margin-bottom:0.15rem;">{{ $order->user->name }}</div>
                        <div style="font-size:0.813rem;color:var(--text-secondary);">{{ $order->user->email }}</div>
                        @if($order->user->phone)
                        <div style="font-size:0.813rem;color:var(--text-secondary);">{{ $order->user->phone }}</div>
                        @endif
                        @if($order->user->address)
                        <div style="font-size:0.813rem;color:var(--text-secondary);margin-top:0.25rem;">{{ $order->user->address }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div style="font-size:0.69rem;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;color:var(--text-muted);margin-bottom:0.625rem;">Order Info</div>
                        <div style="display:flex;flex-direction:column;gap:0.4rem;">
                            <div style="display:flex;justify-content:space-between;align-items:center;font-size:0.838rem;">
                                <span style="color:var(--text-muted);">Status</span>
                                <span class="badge-pill badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                            </div>
                            <div style="display:flex;justify-content:space-between;font-size:0.838rem;">
                                <span style="color:var(--text-muted);">Date</span>
                                <span>{{ $order->created_at->format('M d, Y h:i A') }}</span>
                            </div>
                            <div style="display:flex;justify-content:space-between;font-size:0.9rem;font-weight:700;border-top:1px solid var(--border);padding-top:0.4rem;margin-top:0.1rem;">
                                <span>Total</span>
                                <span class="text-mono">₱{{ number_format($order->total, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="font-size:0.69rem;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;color:var(--text-muted);margin-bottom:0.625rem;">Items</div>
                <div class="panel mb-4">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th style="text-align:right;">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                            <tr>
                                <td>
                                    <div style="font-weight:600;">{{ $item->product->name }}</div>
                                    <div class="subtext">{{ $item->product->category->name ?? 'Uncategorized' }}</div>
                                </td>
                                <td class="mono">₱{{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="mono" style="text-align:right;font-weight:600;">₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($order->status !== 'completed')
                <div style="background:var(--surface-2);border:1px solid var(--border);border-radius:var(--radius);padding:1rem;">
                    <div style="font-size:0.69rem;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;color:var(--text-muted);margin-bottom:0.75rem;">Update Status</div>
                    <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                        @csrf
                        <div style="display:flex;gap:0.625rem;align-items:center;">
                            <select name="status" class="form-select" style="flex:1;">
                                <option value="pending"    {{ $order->status == 'pending'    ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="shipped"    {{ $order->status == 'shipped'    ? 'selected' : '' }}>Shipped</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled"  {{ $order->status == 'cancelled'  ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="btn-primary-admin" style="white-space:nowrap;">
                                <i class="bi bi-arrow-repeat"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary-admin" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
