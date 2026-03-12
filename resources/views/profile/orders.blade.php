@extends('layouts.app')

@section('title', 'My Orders — SoulMates Inc.')

@section('content')
<div class="container py-5">
    <h2 class="mb-4" style="font-family: var(--font-display); font-weight: 800;">My Orders</h2>

    @if($orders->count() > 0)
        @foreach($orders as $order)
            <div class="card mb-3 border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <div>
                        <strong>{{ $order->order_number }}</strong>
                        <span class="text-muted ms-3" style="font-size:0.82rem;">
                            {{ $order->created_at->format('M d, Y') }}
                        </span>
                    </div>
                    <span class="badge rounded-pill
                        @if($order->status === 'completed') bg-success
                        @elseif($order->status === 'cancelled') bg-danger
                        @elseif($order->status === 'shipped') bg-info text-dark
                        @elseif($order->status === 'processing') bg-primary
                        @else bg-warning text-dark
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div class="card-body p-3">
                    @foreach($order->orderItems as $item)
                        <div class="d-flex justify-content-between align-items-center py-2
                             {{ !$loop->last ? 'border-bottom' : '' }}">
                            <div class="d-flex align-items-center gap-3">
                                @if($item->product && $item->product->photos->first())
                                    <img src="{{ asset('product_photos/' . $item->product->photos->first()->image_path) }}"
                                         style="width:50px; height:50px; object-fit:cover; border-radius:3px;">
                                @else
                                    <div style="width:50px; height:50px; background:#f3f0ea; border-radius:3px;
                                                display:flex; align-items:center; justify-content:center;">👟</div>
                                @endif
                                <div>
                                    <div style="font-weight:600; font-size:0.9rem;">
                                        {{ $item->product->name ?? 'Product unavailable' }}
                                    </div>
                                    <div class="text-muted" style="font-size:0.78rem;">Qty: {{ $item->quantity }}</div>
                                </div>
                            </div>
                            <div style="font-family: var(--font-mono); font-weight:700;">
                                ₱{{ number_format($item->subtotal, 2) }}
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-end mt-3 pt-2 border-top">
                        <strong>Total: ₱{{ number_format($order->orderItems->sum('subtotal'), 2) }}</strong>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $orders->links() }}
    @else
        <div class="text-center py-5 text-muted">
            <div style="font-size:4rem; opacity:0.2;">📦</div>
            <p class="mt-3">You haven't placed any orders yet.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-2">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
