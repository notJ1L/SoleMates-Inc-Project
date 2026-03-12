@extends('layouts.admin')

@section('page-title', 'Order #' . $order->id)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Order #{{ $order->id }}</h3>
        <p class="text-muted mb-0">{{ $order->created_at->format('M d, Y h:i A') }}</p>
    </div>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Orders
    </a>
</div>

<div class="admin-form-card">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="fw-semibold mb-3">Customer Information</h6>
                <table class="table table-sm">
                    <tr>
                        <td class="text-muted" style="width: 120px;">Name:</td>
                        <td>{{ $order->user->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email:</td>
                        <td>{{ $order->user->email }}</td>
                    </tr>
                    @if($order->user->phone)
                    <tr>
                        <td class="text-muted">Phone:</td>
                        <td>{{ $order->user->phone }}</td>
                    </tr>
                    @endif
                    @if($order->user->address)
                    <tr>
                        <td class="text-muted">Address:</td>
                        <td>{{ $order->user->address }}</td>
                    </tr>
                    @endif
                </table>
            </div>
            <div class="col-md-6">
                <h6 class="fw-semibold mb-3">Order Information</h6>
                <table class="table table-sm">
                    <tr>
                        <td class="text-muted" style="width: 120px;">Order #:</td>
                        <td class="font-mono">{{ $order->order_number ?? '#' . $order->id }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Status:</td>
                        <td>
                            <span class="badge-status badge-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Shipping address:</td>
                        <td>{{ $order->shipping_address ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Phone:</td>
                        <td>{{ $order->phone ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Payment:</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $order->payment_method ?? '—')) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <h6 class="fw-semibold mb-3">Order Items</h6>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>
                                <div class="fw-semibold">{{ $item->product->name ?? 'Product' }}</div>
                                @if($item->product && $item->product->category)
                                    <div class="text-muted small">{{ $item->product->category->name }}</div>
                                @endif
                            </td>
                            <td class="font-mono">₱{{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td class="font-mono fw-semibold">₱{{ number_format($item->subtotal ?? ($item->price * $item->quantity), 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row justify-content-end mt-4">
            <div class="col-md-4">
                <table class="table table-sm">
                    @if(isset($order->shipping) && $order->shipping > 0)
                    <tr>
                        <td class="text-muted">Subtotal:</td>
                        <td class="text-end font-mono">₱{{ number_format($order->subtotal ?? $order->total, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Shipping:</td>
                        <td class="text-end font-mono">₱{{ number_format($order->shipping ?? 0, 2) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="fw-semibold">Total:</td>
                        <td class="text-end font-mono fw-bold">₱{{ number_format($order->total, 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        @if($order->status !== 'completed' && $order->status !== 'cancelled')
        <div class="mt-4 p-3 bg-light rounded">
            <h6 class="fw-semibold mb-3">Update Order Status</h6>
            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-flex gap-2 align-items-end">
                @csrf
                <div class="flex-grow-1">
                    <select name="status" class="form-select" required>
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sync me-2"></i>Update Status
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
